@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5>Create Product</h5>
            </div>
            <div class="card-body">
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="" class="form-lable mb-3">Enter Product Name</label>
                        <input type="text" class="form-control" name="name" id="">
                        @error('name')
                            <p class="text-danger fs-6">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-lable mb-3">Choose Category</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-danger fs-6">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-lable mb-3">Enter Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="">
                        @error('quantity')
                            <p class="text-danger fs-6">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-lable mb-3">Enter Price</label>
                        <input type="number" class="form-control" name="price" id="">
                        @error('price')
                            <p class="text-danger fs-6">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-lable mb-3">Choose Image</label><br>
                        <input type="file" name="image" id="">
                        @error('image')
                            <p class="text-danger fs-6">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-lable mb-3">Enter Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
                        @error('description')
                            <p class="text-danger fs-6">{{$message}}</p>
                        @enderror
                    </div>

                    <input type="submit" value="Create" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection