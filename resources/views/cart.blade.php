@extends('layouts.customer')

@section('content')

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
                @php
                    $total = 0;
                @endphp
                @foreach ($cart as $item)
                @php
                    $total += $item->subtotal
                @endphp
                <tr>
                  <td>
                    <div class="media">
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
                    <h5>{{$item->subtotal}}</h5>
                  </td>
                  <td>
                    <a href="{{url('/clearCart', $item->rowId)}}">Clear</a>
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
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Subtotal</h5>
                  </td>
                  <td>
                    <h5>{{$total}}</h5>
                  </td>
                  <td></td>
                </tr>
                
                <tr class="out_button_area">
                  <td></td>
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
