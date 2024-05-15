<!DOCTYPE html>
<html data-navigation-type="default" data-navbar-horizontal-shape="default" lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>@yield('title')</title>

    <link rel="manifest" href="{{ Vite::asset('resources/assets/img/favicons/manifest.json')}}">
    @vite(['resources/assets/vendors/simplebar/simplebar.min.js', 
            'resources/assets/js/config.js'])


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    @vite(['resources/assets/vendors/simplebar/simplebar.min.css',
            'resources/assets/css/theme-rtl.min.css', 
            'resources/assets/css/theme.min.css',
            'resources/assets/css/user-rtl.min.css',
            'resources/assets/css/user.min.css'])
    <script>
      var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
    <style>
        .navbar-vertical.navbar-expand-lg~.navbar-top~.content {
            margin-right: 0;
        }
    </style>
    @yield('styles')
    {{-- <link href="vendors/leaflet/leaflet.css" rel="stylesheet">
    <link href="vendors/leaflet.markercluster/MarkerCluster.css" rel="stylesheet">
    <link href="vendors/leaflet.markercluster/MarkerCluster.Default.css" rel="stylesheet"> --}}
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-vertical navbar-expand-lg">
        <script>
          var navbarStyle = window.config.config.phoenixNavbarStyle;
          if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
          }
        </script>
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
          <!-- scrollbar removed-->
          <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
              <li class="nav-item">
                <div class="nav-item-wrapper">
                    <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }} label-1" href="{{ route('admin.dashboard') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span data-feather="bar-chart"></span>
                            </span>
                            <span class="nav-link-text-wrapper">
                                <span class="nav-link-text">Dashboard</span>
                            </span>
                        </div>
                  </a>
                </div>
              </li>
              <li class="nav-item">
                <div class="nav-item-wrapper">
                    <a class="nav-link label-1 {{ Request::is('admin/opportunities') ? 'active' : '' }}
                    {{ Request::is('admin/opportunity/create') ? 'active' : '' }}
                    {{ Request::is('admin/opportunity/view/'.request()->route('id')) ? 'active' : '' }}
                    {{ Request::is('admin/opportunity/'.request()->route('id').'/edit') ? 'active' : '' }}
                    {{ Request::is('admin/opportunity/'.request()->route('opp_id').'/assign_users') ? 'active' : '' }}" href="{{ route('admin.opportunity.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span data-feather="clipboard"></span>
                            </span>
                            <span class="nav-link-text-wrapper">
                                <span class="nav-link-text">Opportunities</span>
                            </span>
                        </div>
                  </a>
                </div>
              </li>
              <li class="nav-item">
                <div class="nav-item-wrapper">
                    <a class="nav-link label-1 {{ Request::is('admin/users') ? 'active' : '' }}" href="{{ route('admin.user.index') }}" role="button" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span data-feather="users"></span>
                            </span>
                            <span class="nav-link-text-wrapper">
                                <span class="nav-link-text">Users</span>
                            </span>
                        </div>
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="navbar-vertical-footer">
          <button class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center"><span class="uil uil-left-arrow-to-left fs-8"></span><span class="uil uil-arrow-from-right fs-8"></span><span class="navbar-vertical-footer-text ms-2">Collapsed View</span></button>
        </div>
      </nav>


      <nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault">
        <div class="collapse navbar-collapse justify-content-between">
          <div class="navbar-logo">

            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="{{ route('admin.dashboard') }}">
              <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                  <p class="logo-text ms-2 d-none d-sm-block">HUGO</p>
                </div>
              </div>
            </a>
          </div>
          <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
              <div class="theme-control-toggle fa-icon-wait px-2">
                <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="moon"></span></label>
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="sun"></span></label>
              </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-l ">
                  <img class="rounded-circle " src="{{ Vite::asset('resources/assets/img/team/40x40/57.webp')}}" alt="" />

                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border" aria-labelledby="navbarDropdownUser">
                <div class="card position-relative border-0">
                  <div class="card-body p-0">
                    <div class="text-center pt-4 pb-3">
                      <div class="avatar avatar-xl ">
                        <img class="rounded-circle " src="{{ Vite::asset('resources/assets/img/team/72x72/57.webp')}}" alt="" />

                      </div>
                      <h6 class="mt-2 text-body-emphasis">{{ Auth::user()->name }}</h6>
                    </div>
                    <div class="mb-3 mx-3">
                      <input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" />
                    </div>
                  </div>
                  <div class="overflow-auto scrollbar" style="height: 6rem;">
                    <ul class="nav d-flex flex-column mb-2 pb-1">
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-body" data-feather="user"></span><span>Profile</span></a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="{{ route('admin.dashboard') }}"><span class="me-2 text-body" data-feather="pie-chart"></span>Dashboard</a></li>
                    </ul>
                  </div>
                  <div class="card-footer p-0 border-top border-translucent">
                    <div class="px-3"> 
                      <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> 
                        <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                    <div class="my-2 text-center fw-bold fs-10 text-body-quaternary"><a class="text-body-quaternary me-1" href="#!">Privacy policy</a>&bull;<a class="text-body-quaternary mx-1" href="#!">Terms</a>&bull;<a class="text-body-quaternary ms-1" href="#!">Cookies</a></div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>


        <div class="content">
            @yield('content')
            <footer class="footer position-absolute">
                <div class="row g-0 justify-content-between align-items-center h-100">
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 mt-2 mt-sm-0 text-body">
                            2024 &copy; All Rights reserved
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script
          src="https://code.jquery.com/jquery-3.7.1.min.js"
          integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
          crossorigin="anonymous"></script>
    @vite(['resources/assets/vendors/popper/popper.min.js',
            'resources/assets/vendors/bootstrap/bootstrap.min.js',
            // 'resources/assets/vendors/anchorjs/anchor.min.js',
            // 'resources/assets/vendors/is/is.min.js',
            'resources/assets/vendors/fontawesome/all.min.js',
            'resources/assets/vendors/lodash/lodash.min.js',
            // 'https://polyfill.io/v3/polyfill.min.js?features=window.scroll',
            'resources/assets/vendors/list.js/list.min.js',
            'resources/assets/vendors/feather-icons/feather.min.js',
            // 'resources/assets/vendors/dayjs/dayjs.min.js',
            // 'resources/assets/vendors/leaflet/leaflet.js',
            // 'resources/assets/vendors/leaflet.markercluster/leaflet.markercluster.js',
            // 'resources/assets/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js',
            'resources/assets/vendors/prism/prism.js',
            'resources/assets/js/phoenix.js',
            // 'resources/assets/vendors/echarts/echarts.min.js',
            'resources/assets/js/ecommerce-dashboard.js'])
    @yield('scripts')
  </body>

</html>