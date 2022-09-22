@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('message') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <h5>Product</h5>
                    </div>
                    <div class="col-md-9">
                        <a href="{{route('product.create')}}" class="btn btn-primary btn-sm float-end">Create</a>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Action</th>
                    </thead>
                    <tbody>    
                        @foreach ($products as $product)
                        <tr>
                            <td>
                                <img src="{{asset('images/'.$product->image)}}" width="80px" class="img-thumbnail" alt="">
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{substr($product->description, 0, 60)}}</td>
                            <td>
                                <a href="{{route('product.edit', $product->id)}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{route('product.destroy', $product->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this?')">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="float-end mt-3">
            {{ $products->links() }}
        </div>
    </div>
@endsection
