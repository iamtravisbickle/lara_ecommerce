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
              <h2>Product Checkout</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="{{url('/')}}">Home</a>
              <a href="">Product Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
      <div class="container">
        <div class="billing_details">
          <div class="row justify-content-md-center">
            <div class="col-lg-9">
              <div class="order_box">
                <h2>Your Order</h2>
                <ul class="list">
                  <li>
                    <a href="">
                      <h5 class="d-inline">Product</h5>
                      <span class="font-weight-bold">Total</span>
                    </a>
                  </li>
                  @php
                      $total = 0;
                  @endphp
                  @foreach ($cart as $item)
                  @php
                      $total += $item->subtotal
                  @endphp
                  <li>
                    <a href="#">{{$item->name}}
                      <span class="middle">x {{$item->qty}}</span>
                      <span class="last">{{$item->subtotal}}</span>
                    </a>
                  </li>
                  @endforeach
                </ul>
                <ul class="list list_2 mt-3">
                  <li>
                    <a href="#"
                      >Total
                      <span>{{$total}}</span>
                    </a>
                  </li>
                </ul>

                <a class="main_btn mt-5" href="{{url('/confirm')}}">Submit Your Order</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Checkout Area =================-->

@endsection
