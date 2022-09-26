@extends('layouts.customer')

@section('content')
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>{{ session('message') }}</strong>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
    @endif

    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2>Cart</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="{{url('/')}}">Home</a>
              <a href="">Cart</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Cart Area =================-->
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cart as $item)
                <tr>
                  <td>
                    <div class="media">
                      {{-- <div class="d-flex">
                        <img
                          src=""
                          alt=""
                          width="100px"
                          height="120px"
                        />
                      </div> --}}
                      <div class="media-body">
                        <p>{{$item->name}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5>{{$item->price}}</h5>
                  </td>
                  <td>
                    <h5>{{$item->qty}}</h5>
                  </td>
                  <td>
                    <h5>{{$item->price * $item->qty}}</h5>
                  </td>
                  <td>
                    <a href="{{url('/clearCart', $item->rowId)}}">Clear</a>
                    {{-- <form action="" method="post">
                      @csrf
                      <button class="btn btn-sm btn-success" type="submit">Clear</button>
                    </form> --}}
                  </td>
                </tr>
                @endforeach

                <tr class="bottom_button">
                  <td>
                    <a class="gray_btn" style="background-color: #dc3545" href="{{url('/deleteCart')}}">Clear Cart</a>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Subtotal</h5>
                  </td>
                  <td>
                    <h5>$2160.00</h5>
                  </td>
                </tr>
                
                <tr class="out_button_area">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="checkout_btn_inner">
                      <a class="gray_btn" href="{{url('category')}}">Continue Shopping</a>
                      <a class="main_btn" href="{{url('checkout')}}">Proceed to checkout</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--================End Cart Area =================-->

@endsection
