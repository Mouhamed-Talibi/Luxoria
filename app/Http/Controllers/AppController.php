<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\FindProductRequest;
    use App\Models\Category;
    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Session;

    class AppController extends Controller
    {
        // home method
        public function home() {
            return view('home');
        }

        // index method
        public function index() {
            $bestSellingProducts = Product::with('category')
                ->orderBy('name', 'asc')
                ->limit(8)->get();
            $categories = Category::orderBy('name', 'asc')
                ->get();
            // return view with data
            return view('app.index', compact(['bestSellingProducts', 'categories']));
        }

        // lang switch method
        public function langSwitch($locale) {
            // check if locale is valid (optional)
            if (! in_array($locale, ['en', 'ar'])) {
                abort(400);
            }

            // Set the locale
            App::setLocale($locale);

            // Store in session
            Session::put('locale', $locale);

            return Redirect::back();
        }

        //  find product method 
        public function findProduct(FindProductRequest $request) {
            $validated = $request->validated();
            $products = Product::where('name', 'like', '%'. $validated['search_text'] . '%')
                ->orWhere('slug', 'like', '%' . $validated['search_text'] . '%')
                ->with(['category', 'images'])
                ->get();
            if($products->isEmpty()) {
                return Redirect::back()->with('warning', '  .لم يتم العثور على منتجات تطابق بحثك. المرجو اعادة المحاولة');
            }
            return view('app.find_product', compact('products'));
        }
    }
