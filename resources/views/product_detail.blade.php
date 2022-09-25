@extends('layouts.customer')

@section('content')
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
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
              <h2>Product Details</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="{{url('/')}}">Home</a>
              <a href="">Product Details</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Single Product Area =================-->
    <div class="product_image_area mb-5">
      <div class="container">
        <div class="row s_product_inner">
          <div class="col-lg-6">
            <div class="s_product_img">
              <img class="img-fluid w-100" src="{{asset('images/'. $product->image)}}" alt="" />
            </div>
          </div>
          <div class="col-lg-5 offset-lg-1">
            <div class="s_product_text">
              <h3>{{$product->name}}</h3>
              <h2>{{$product->price}}</h2>
              <ul class="list">
                <li>
                  <a class="active" href="#">
                    <span>Category</span> : {{$category->name}}</a
                  >
                </li>
                <li>
                  <a href="#"> <span>Availibility</span> : In Stock</a>
                </li>
              </ul>
              <p>
                {{$product->description}}
              </p>
              <form action="{{url('addToCart')}}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="product_count">
                  <label for="qty">Quantity:</label>
                  <input
                    type="text"
                    name="qty"
                    id="sst"
                    maxlength="12"
                    value="1"
                    title="Quantity:"
                    class="input-text qty"
                  />
                  <button
                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                    class="increase items-count"
                    type="button"
                  >
                    <i class="lnr lnr-chevron-up"></i>
                  </button>
                  <button
                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                    class="reduced items-count"
                    type="button"
                  >
                    <i class="lnr lnr-chevron-down"></i>
                  </button>
                </div>
                <div class="card_area">
                  <input type="submit" value="Add to Cart" class="main_btn">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================End Single Product Area =================-->

@endsection
