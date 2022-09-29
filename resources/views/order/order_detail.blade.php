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
                        <h5>Order Detail</h5>
                    </div>
                    <div class="col-md-9">
                        
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                        @foreach ($order_details as $order_detail)
                        <tr>
                            <td>{{$order_detail->product->name}}</td>
                            <td>{{$order_detail->quantity}}</td>
                            <td>{{$order_detail->product->price}}</td>
                            <td>{{$order_detail->quantity * $order_detail->product->price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
