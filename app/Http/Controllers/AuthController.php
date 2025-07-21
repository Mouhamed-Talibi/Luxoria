<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\LoginRequest;
    use App\Http\Requests\SignupRequest;
    use App\Mail\EmailConfirmation;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\RateLimiter;

    class AuthController extends Controller
    {
        // loginForm method
        public function loginForm() {
            return view('auth.login');
        }

        // login method
        public function login(LoginRequest $request)
        {
            $credentials = $request->validated();
            // check user exists
            $user = User::where('email', $credentials['email'])->first();
            if(!$user) {
                return back()->with('error', 'No Account Found !');
            }

            // compare data
            if(Auth::attempt($credentials)) {
                if($user->role === "admin") {
                    return redirect()->route('admin.dashboard')
                        ->with('success', "Welcome Back Admin");
                }

                $request->session()->regenerate();
                return redirect()->route('app.home')
                    ->with('success', "Welcome Back {$user->name}");
            }

            return back()->with('error', 'Invalid Credentials');
        }

        // signupForm method
        public function signupForm() {
            return view('auth.signup');
        }

        // signup method
        public function signup(SignupRequest $request) {
            $validatedInputs = $request->validated();
            // hash password
            $hashedPassword = Hash::make($validatedInputs['password']);
            $validatedInputs['password'] = $hashedPassword;

            // create user
            $user = User::create([
                'name' => $validatedInputs['name'],
                'email' => $validatedInputs['email'],
                'gender' => $validatedInputs['gender'],
                'password' => $hashedPassword,
            ]);

            Mail::to($user->email)->send(new EmailConfirmation($user));
            return redirect()
                ->route('auth.verify_email')
                ->with("success", 
                "We've sent you an email verification link. Please check your email messages and confirm your account");
        }

        // verify Email method
        public function verifyEmail() {
            return view('auth.verify_email');
        }

        // confirm email method
        public function confirmEmail(string $hash) {
            $decodedHash = explode('/', base64_decode($hash));
            $id = $decodedHash[0];
            $created_at = $decodedHash[1];

            // find user
            $user = User::findOrFail($id);

            // compare data
            if($user->created_at->toDateTimeString() !== $created_at || $user->email_verified_at !== null) { 
                abort(403);
            } else {
                $user->email_verified_at = now();
                $saved = $user->save();
                if($saved) {
                    return redirect()->route('auth.login_form')
                        ->with('success', 'Your account has been verified. You can now login');
                } else {
                    abort(404);
                }
            }
        }

        // logout method
        public function logout(Request $request) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('app.app')
                ->with('success', 'You have been logged out successfully'); 
        }
    }
