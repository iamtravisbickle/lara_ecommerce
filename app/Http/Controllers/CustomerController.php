<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Gloudemans\Shoppingcart\Facades\Cart;
use LengthException;
use Ramsey\Uuid\Type\Integer;

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
                    ->where('quantity', '>', 0)
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
        // Fetch User Id
        $userId = Auth::user()->id;

        // Fetch Cart Items
        $cart = Cart::content();

        // Fetch Total Amount
        $total = 0;
        foreach ($cart as $item) {
            $total += $item->subtotal;
        }

        // Insert into Order Table
        $result = Order::create([
            'user_id' => $userId,
            'total_price' => $total
        ]);
        
        // Fetch last insert id from Order Table
        $orders = Order::orderBy('id', 'desc')->get();
        $orderId = $orders[0]->id;

        // Fetch product id & qty from Cart
        $productId = $cart->pluck('id');
        $quantity = $cart->pluck('qty');

        // Insert into Order Detail Table
        if($result) {
            for ($i=0; $i < count($productId); $i++) {
                OrderDetail::create([
                    'order_id' => $orderId,
                    'product_id' => $productId[$i],
                    'quantity' => $quantity[$i]
                ]);

            //    Product::find('id', $productId[$i])
            //             ->decrement('quantity', $quantity[$i]);
            }
        }

        Cart::destroy();
        return view('confirm');
    }

    public function contact()
    {
        return view('contact');
    }

    // Show Register Form
    public function register()
    {
        if(auth()->user()) {
            return redirect('/');
        }
        return view('register');
    }

    // Account Create
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

    // Show Login Form
    public function login()
    {
        if(auth()->user()) {
            return redirect('/');
        }
        return view('login');
    }

    // Account Login
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

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('message', 'You are now logged out');
    }
}
