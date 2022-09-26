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
              <h2>Product Confirm</h2>
            </div>
            <div class="page_link">
              <a href="{{url('/')}}">Home</a>
              <a href="">Product Confirm</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->
    
    <div class="container p-5 mb-5 mt-5">
        <h3 class="text-center">Thank You. Your order has been received.</h3>
    </div>

@endsection