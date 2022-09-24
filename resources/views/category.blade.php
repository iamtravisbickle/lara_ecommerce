@extends('layouts.customer')

@section('content')
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div class="banner_content d-md-flex justify-content-between align-items-center">
            <div class="mb-3 mb-md-0">
              <h2>Shop Category</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="{{url('/')}}">Home</a>
              <a href="{{url('/category')}}">Shop</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-9">
            <div class="product_top_bar">
              <nav class="navbar navbar-light bg-light">
                <form class="form-inline" action="">
                  <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                </form>
              </nav>
            </div>  

            <div class="latest_product_inner">
              <div class="row">
                @foreach ($products as $product)
                  <div class="col-lg-4 col-md-6">
                    <div class="single-product">
                      <div class="product-img">
                        <img
                          class="card-img"
                          src="{{asset('images/'.$product->image)}}"
                          alt=""
                          width="150px"
                          height="250px"
                        />
                        <div class="p_icon">
                          <a href="{{url('product_detail', $product->id)}}">
                            <i class="ti-eye"></i>
                          </a>
                          <a href="#">
                            <i class="ti-heart"></i>
                          </a>
                          <a href="#">
                            <i class="ti-shopping-cart"></i>
                          </a>
                        </div>
                      </div>
                      <div class="product-btm">
                        <a href="#" class="d-block">
                          <h4>{{$product->name}}</h4>
                        </a>
                        <div class="mt-3">
                          <span class="mr-4">{{$product->price}}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>

              <div class="float-right mt-3">
                {{ $products->links() }}
              </div>

            </div>
          </div>

          <div class="col-lg-3">
            <div class="left_sidebar_area">
              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Browse Categories</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                    @foreach ($categories as $category)
                      <li>
                        <a href="/category?categoryId={{$category->id}}">{{$category->name}}</a>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Category Product Area =================-->

@endsection
