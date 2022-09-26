<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="/img/favicon.png" type="image/png" />
  <title>Eiser ecommerce</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/css/bootstrap.css" />
  <link rel="stylesheet" href="/vendors/linericon/style.css" />
  <link rel="stylesheet" href="/css/font-awesome.min.css" />
  <link rel="stylesheet" href="/css/themify-icons.css" />
  <link rel="stylesheet" href="/css/flaticon.css" />
  <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="/vendors/lightbox/simpleLightbox.css" />
  <link rel="stylesheet" href="/vendors/nice-select/css/nice-select.css" />
  <link rel="stylesheet" href="/vendors/animate-css/animate.css" />
  <link rel="stylesheet" href="/vendors/jquery-ui/jquery-ui.css" />
  <!-- main css -->
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="/css/responsive.css" />
</head>

<body>

    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2>Already have an account?</h2>
              <a href="{{url('/login')}}" style="color: #797979">Login</a>
            </div>
            <div class="page_link">
              <a href="{{url('/')}}">Home</a>
              <a href="">Register</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <section class="section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h2 class="contact-title mb-4">Register</h2>
                    <form action="{{url('/create')}}" class="form-contact contact_form" method="post">
                      @csrf
                      <div class="form-group">
                          <input class="form-control" name="name" type="text" placeholder="Name">
                          @error('name')
                            <p class="text-danger fs-6">{{$message}}</p>
                          @enderror
                      </div>

                      <div class="form-group">
                          <input class="form-control" name="email" type="email" placeholder="Email">
                          @error('email')
                            <p class="text-danger fs-6">{{$message}}</p>
                          @enderror
                      </div>

                      <div class="form-group">
                          <input class="form-control" name="phone" type="text" placeholder="Phone">
                          @error('phone')
                            <p class="text-danger fs-6">{{$message}}</p>
                          @enderror
                      </div>

                      <div class="form-group">
                          <input class="form-control" name="address" type="text" placeholder="Address">
                          @error('address')
                            <p class="text-danger fs-6">{{$message}}</p>
                          @enderror
                      </div>

                      <div class="form-group">
                          <input class="form-control" name="password" type="password" placeholder="Password">
                          @error('password')
                            <p class="text-danger fs-6">{{$message}}</p>
                          @enderror
                      </div>

                      <div class="form-group mt-lg-3">
                          <button type="submit" class="main_btn mr-2">Register</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="/js/jquery-3.2.1.min.js"></script>
  <script src="/js/popper.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/stellar.js"></script>
  <script src="/vendors/lightbox/simpleLightbox.min.js"></script>
  <script src="/vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="/vendors/isotope/imagesloaded.pkgd.min.js"></script>
  <script src="/vendors/isotope/isotope-min.js"></script>
  <script src="/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="/js/jquery.ajaxchimp.min.js"></script>
  <script src="/vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="/vendors/counter-up/jquery.counterup.js"></script>
  <script src="/js/mail-script.js"></script>
  <script src="/js/theme.js"></script>
</body>

</html>