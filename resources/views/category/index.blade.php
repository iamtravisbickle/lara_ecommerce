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
                        <h5>Category</h5>
                    </div>
                    <div class="col-md-9">
                        <a href="{{route('category.create')}}" class="btn btn-primary btn-sm float-end">Create</a>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>    
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>
                                <a href="{{route('category.edit', $category->id)}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{route('category.destroy', $category->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this?')">
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
            {{ $categories->links() }}
        </div>
    </div>
@endsection
