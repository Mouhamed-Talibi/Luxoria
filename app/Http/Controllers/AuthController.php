<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\SignupRequest;
    use App\Mail\EmailConfirmation;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Mail;

    class AuthController extends Controller
    {
        // loginForm method
        public function loginForm() {
            return view('auth.login');
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
    }
