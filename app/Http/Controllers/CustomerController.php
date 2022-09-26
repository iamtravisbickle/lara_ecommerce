<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Gloudemans\Shoppingcart\Facades\Cart;

class CustomerController extends Controller
{
    public function index()
    {
        $products = Product::where('id', '<=', 4)->get();
        return view('index', compact('products'));
    }

    public function category()
    {   
        $categoryId = request('categoryId');
        $categories = Category::all();

        if(request('search')) {
            $searchValue = request('search');
            $products = Product::where('name', 'like', "%$searchValue%")
                    ->orWhere('description', 'like', "%$searchValue%")
                    ->orWhere('price', 'like', "%$searchValue%")
                    ->latest()
                    ->paginate('6');

            return view('category', compact('categories', 'products'));
        }

        $products = Product::where('category_id', 'like', "%$categoryId%")
                    ->latest()
                    ->paginate('6');

        return view('category', compact('categories', 'products'));
    }

    public function product_detail($id)
    {
        $product = Product::find($id);
        $category = Category::find($product->category_id);
        return view('product_detail', compact('category', 'product'));
    }

    public function checkout()
    {
        $cart = Cart::content();
        return view('checkout', compact('cart'));
    }

    public function confirm()
    {
        return Cart::content();
        

        // Cart::destroy();
        return view('confirm');
    }

    public function contact()
    {
        return view('contact');
    }

    public function register()
    {
        if(auth()->user()) {
            return redirect('/');
        }
        return view('register');
    }

    public function create(Request $request)
    {
        // dd(Hash::make($request->password));
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address 
        ]);
        return redirect('/login')->with('message', 'Account created successfully');
    }

    public function login()
    {
        if(auth()->user()) {
            return redirect('/');
        }
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in');
        }
        
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('message', 'You are now logged out');
    }
}
