<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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
        return view('checkout');
    }

    public function contact()
    {
        return view('contact');
    }
}
