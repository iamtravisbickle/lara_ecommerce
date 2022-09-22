<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $products = Product::where('id', '<=', 4)->get();
        return view('index', compact('products'));
    }

    public function category()
    {
        $categoires = Category::all();
        $products = Product::orderBy('id', 'desc')->paginate('6');
        return view('category', compact('categoires', 'products'));
    }

    public function product_detail($id)
    {
        $product = Product::where('id', $id)->get();
        return view('product_detail', compact('product'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function contact()
    {
        return view('contact');
    }
}
