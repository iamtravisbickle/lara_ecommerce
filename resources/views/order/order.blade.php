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
                        <h5>Order</h5>
                    </div>
                    <div class="col-md-9">
                        
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Total Price</th>
                        <th>Order Detail</th>
                    </thead>
                    <tbody>    
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->total_price}}</td>
                            <td>
                                <a href="/admin/order_detail/{{$order->id}}" class="btn btn-success btn-sm">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="float-end mt-3">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
