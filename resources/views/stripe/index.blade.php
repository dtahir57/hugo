<!DOCTYPE html>
<html data-navigation-type="default" data-navbar-horizontal-shape="default" lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Phoenix</title>


    <!-- ===============================================-->

    <link rel="manifest" href="{{ Vite::asset('resources/assets/img/favicons/manifest.json') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ Vite::asset('resources/assets/vendors/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/js/config.js') }}"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="{{ Vite::asset('resources/assets/vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="{{ Vite::asset('resources/assets/css/theme-rtl.min.css') }}" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="{{ Vite::asset('resources/assets/css/theme.min.css') }}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{ Vite::asset('resources/assets/css/user-rtl.min.css') }}" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="{{ Vite::asset('resources/assets/css/user.min.css') }}" type="text/css" rel="stylesheet" id="user-style-default">
  </head>


  <body>
    <div class="container">
      <div class="row mt-4">
        <div class="col-md-6 col-sm-12 mx-auto">
          <div class="card h-100 overflow-hidden cursor-pointer">
            <div class="bg-holder d-dark-none" style="background-image:url({{ Vite::asset('resources/assets/img/bg/9.png') }});background-position:left bottom;background-size:auto;">
            </div>
            <!--/.bg-holder-->
      
            <div class="bg-holder d-light-none" style="background-image:url({{ Vite::asset('resources/assets/img/bg/9-dark.png')}});background-position:left bottom;background-size:auto;">
            </div>
            <!--/.bg-holder-->
      
            <div class="card-body d-flex flex-column justify-content-between position-relative">
              <div class="d-flex justify-content-between">
                <div class="mb-5 mb-md-0 mb-lg-5 me-3">
                  <div class="d-sm-flex align-items-center mb-3">
                    <h3 class="mb-0">Weekly Opportunities</h3>
                  </div>
                  <p class="fs-9 text-body-tertiary">Get access to unlimited opportunities weekly <br> with email notifications</p>
                  <div class="d-flex align-items-end mb-md-5 mb-lg-0">
                    <h4 class="fw-bolder me-1">$249.00</h4>
                    <h5 class="fs-9 fw-normal text-body-tertiary ms-1">Per month</h5>
                  </div>
                </div><img class="d-dark-none" src="{{ Vite::asset('resources/assets/img/spot-illustrations/bag-2.png')}}" width="54" height="54" alt="" /><img class="d-light-none" src="{{ Vite::asset('resources/assets/img/spot-illustrations/bag-2-dark.png')}}" width="54" height="54" alt="" />
              </div>
              <div class="row flex-1 justify-content-end">
                <div class="col-sm-8 col-md-12">
                  <div class="d-sm-flex d-md-block d-lg-flex justify-content-end align-items-end h-100">
                    <ul class="list-unstyled mb-0 border-start-sm border-start-md-0 border-start-lg ps-sm-5 ps-md-0 ps-lg-5 border-translucent">
                      <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Unlimited Weekly Opportunities</span></li>
                      <li class="d-flex align-items-center"><span class="uil uil-check-circle text-success me-2"></span><span class="text-body-tertiary fw-semibold">Email Notifications</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-md-6 col-sm-12 mx-auto">
          <div class="d-flex justify-content-around">
            <a href="{{ route('stripe.checkout', config('stripe.price_id')) }}" type="button" class="btn btn-success btn-block">Go to checkout</a>
            <div class="logout">
              <a type="button" class="btn btn-primary" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ Vite::asset('resources/assets/vendors/popper/popper.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/vendors/is/is.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ Vite::asset('resources/assets/vendors/list.js/list.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/vendors/dayjs/dayjs.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/assets/js/phoenix.js') }}"></script>

  </body>

</html>