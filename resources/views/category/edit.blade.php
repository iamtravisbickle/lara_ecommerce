@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5>Edit Category</h5>
            </div>
            <div class="card-body">
                <form action="{{route('category.update', $category->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="" class="form-lable mb-3">Enter Category Name</label>
                        <input type="text" class="form-control" name="name" id="" value="{{$category->name}}">
                        @error('name')
                            <p class="text-danger fs-6">{{$message}}</p>
                        @enderror
                    </div>
                    <input type="submit" value="Update" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection