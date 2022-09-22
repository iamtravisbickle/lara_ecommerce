<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate('6');
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,webp',
            'description' => 'required'
        ]);

        //Image Upload
        $file = $request->file('image');
        $file_name = uniqid().$file->getClientOriginalName();
        $file->move(public_path('/images'), $file_name);

        // Store Data

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $file_name,
            'description' => $request->description
        ]);

        return redirect(route('product.index'))->with('message', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        //Image Upload

        if($request->file('image')) {
            $file = $request->file('image');
            $file_name = uniqid().$file->getClientOriginalName();
            $file->move(public_path('/images'), $file_name);

            Product::where('id', $id)->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'image' => $file_name,
                'description' => $request->description
            ]);
        }

        Product::where('id', $id)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return redirect(route('product.index'))->with('message', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect(route('product.index'))->with('message', 'Product deleted successfully');
    }
}
