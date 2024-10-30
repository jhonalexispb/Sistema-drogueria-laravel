<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <!--
    Available classes for <html> element:

    'dark'                  Enable dark mode - Default dark mode preference can be set in app.js file (always saved and retrieved in localStorage afterwards):
                              window.Dashmix = new App({ darkMode: "system" }); // "on" or "off" or "system"
    'dark-custom-defined'   Dark mode is always set based on the preference in app.js file (no localStorage is used)
  -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title>Dashmix - Bootstrap 5 Admin Template &amp; UI Framework</title>

  <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
  <meta name="author" content="pixelcave">
  <meta name="robots" content="index, follow">

  <!-- Icons -->
  <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
  <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

  <!-- Modules -->
  @yield('css')
  @vite(['resources/sass/main.scss', 'resources/js/dashmix/app.js'])

  <!-- Alternatively, you can also include a specific color theme after the main stylesheet to alter the default color theme of the template -->
  {{-- @vite(['resources/sass/main.scss', 'resources/sass/dashmix/themes/xwork.scss', 'resources/js/dashmix/app.js']) --}}

  <!-- Load and set dark mode preference (blocking script to prevent flashing) -->
  <script src="{{ asset('js/setTheme.js') }}"></script>
  @yield('js')
</head>

<body>
  <!-- Page Container -->
  <!--
    Available classes for #page-container:

    SIDEBAR & SIDE OVERLAY

      'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
      'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
      'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
      'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
      'sidebar-dark'                              Dark themed sidebar

      'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
      'side-overlay-o'                            Visible Side Overlay by default

      'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

      'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

    HEADER

      ''                                          Static Header if no class is added
      'page-header-fixed'                         Fixed Header


    FOOTER

      ''                                          Static Footer if no class is added
      'page-footer-fixed'                         Fixed Footer (please have in mind that the footer has a specific height when is fixed)

    HEADER STYLE

      ''                                          Classic Header style if no class is added
      'page-header-dark'                          Dark themed Header
      'page-header-glass'                         Light themed Header with transparency by default
                                                  (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
      'page-header-glass page-header-dark'         Dark themed Header with transparency by default
                                                  (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

    MAIN CONTENT LAYOUT

      ''                                          Full width Main Content if no class is added
      'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
      'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        
    DARK MODE

      'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
  -->
  <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">
    <!-- Side Overlay-->
    <aside id="side-overlay">
      <!-- Side Header -->
      <div class="bg-image" style="background-image: url('{{ asset('media/various/bg_side_overlay_header.jpg') }}');">
        <div class="bg-primary-op">
          <div class="content-header">
            <!-- User Avatar -->
            <a class="img-link me-1" href="javascript:void(0)">
              <img class="img-avatar img-avatar48" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
            </a>
            <!-- END User Avatar -->

            <!-- User Info -->
            <div class="ms-2">
              <a class="text-white fw-semibold" href="javascript:void(0)">George Taylor</a>
              <div class="text-white-75 fs-sm">Full Stack Developer</div>
            </div>
            <!-- END User Info -->

            <!-- Close Side Overlay -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="text-white ms-auto" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
              <i class="fa fa-times-circle"></i>
            </a>
            <!-- END Close Side Overlay -->
          </div>
        </div>
      </div>
      <!-- END Side Header -->

      <!-- Side Content -->
      <div class="content-side">
        <div class="block mb-0 pull-x">
          <!-- Sidebar -->
          <div class="block-content block-content-sm block-content-full bg-body">
            <span class="text-uppercase fs-sm fw-bold">Sidebar</span>
          </div>
          <div class="block-content block-content-full">
            <div class="text-center row g-sm">
              <div class="mb-1 col-6">
                <a class="py-3 d-block bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="sidebar_style_dark" href="javascript:void(0)">Dark</a>
              </div>
              <div class="mb-1 col-6">
                <a class="py-3 d-block bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="sidebar_style_light" href="javascript:void(0)">Light</a>
              </div>
            </div>
          </div>
          <!-- END Sidebar -->

          <!-- Header -->
          <div class="block-content block-content-sm block-content-full bg-body">
            <span class="text-uppercase fs-sm fw-bold">Header</span>
          </div>
          <div class="block-content block-content-full">
            <div class="mb-2 text-center row g-sm">
              <div class="mb-1 col-6">
                <a class="py-3 d-block bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="header_style_dark" href="javascript:void(0)">Dark</a>
              </div>
              <div class="mb-1 col-6">
                <a class="py-3 d-block bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="header_style_light" href="javascript:void(0)">Light</a>
              </div>
              <div class="mb-1 col-6">
                <a class="py-3 d-block bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="header_mode_fixed" href="javascript:void(0)">Fixed</a>
              </div>
              <div class="mb-1 col-6">
                <a class="py-3 d-block bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="header_mode_static" href="javascript:void(0)">Static</a>
              </div>
            </div>
          </div>
          <!-- END Header -->

          <!-- Content -->
          <div class="block-content block-content-sm block-content-full bg-body">
            <span class="text-uppercase fs-sm fw-bold">Content</span>
          </div>
          <div class="block-content block-content-full">
            <div class="text-center row g-sm">
              <div class="mb-1 col-6">
                <a class="py-3 d-block bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="content_layout_boxed" href="javascript:void(0)">Boxed</a>
              </div>
              <div class="mb-1 col-6">
                <a class="py-3 d-block bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="content_layout_narrow" href="javascript:void(0)">Narrow</a>
              </div>
              <div class="mb-1 col-12">
                <a class="py-3 d-block bg-body-dark fw-semibold text-dark" data-toggle="layout" data-action="content_layout_full_width" href="javascript:void(0)">Full Width</a>
              </div>
            </div>
          </div>
          <!-- END Content -->
        </div>
        <div class="block mb-0 pull-x">
          <!-- Content -->
          <div class="block-content block-content-sm block-content-full bg-body">
            <span class="text-uppercase fs-sm fw-bold">Heading</span>
          </div>
          <div class="block-content">
            <p>
              Content..
            </p>
          </div>
          <!-- END Content -->
        </div>
      </div>
      <!-- END Side Content -->
    </aside>
    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <!--
      Sidebar Mini Mode - Display Helper classes

      Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
      Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
          If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

      Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
      Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
      Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->
    <nav id="sidebar" aria-label="Main Navigation">
      <!-- Side Header -->
      <div class="bg-header-dark">
        <div class="content-header bg-white-5">
          <!-- Logo -->
          <a class="tracking-wide text-white fw-semibold" href="/">
            <span class="smini-visible">
              D<span class="opacity-75">x</span>
            </span>
            <span class="smini-hidden">
              BO<span class="opacity-75">NED</span>
            </span>
          </a>
          <!-- END Logo -->

          <!-- Options -->
          <div class="gap-1 d-flex align-items-center">
            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <div class="dropdown">
              <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-dark-mode-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-fw fa-moon" data-dark-mode-icon></i>
              </button>
              <div class="border-0 dropdown-menu dropdown-menu-end smini-hide" aria-labelledby="sidebar-dark-mode-dropdown">
                <button type="button" class="gap-2 dropdown-item d-flex align-items-center" data-toggle="layout" data-action="dark_mode_off" data-dark-mode="off">
                  <i class="opacity-50 far fa-sun fa-fw"></i>
                  <span class="fs-sm fw-medium">Light</span>
                </button>
                <button type="button" class="gap-2 dropdown-item d-flex align-items-center" data-toggle="layout" data-action="dark_mode_on" data-dark-mode="on">
                  <i class="opacity-50 far fa-moon fa-fw"></i>
                  <span class="fs-sm fw-medium">Dark</span>
                </button>
                <button type="button" class="gap-2 dropdown-item d-flex align-items-center" data-toggle="layout" data-action="dark_mode_system" data-dark-mode="system">
                  <i class="opacity-50 fa fa-desktop fa-fw"></i>
                  <span class="fs-sm fw-medium">System</span>
                </button>
              </div>
            </div>
            <!-- END Dark Mode -->

            {{-- <div class="dropdown">
              <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-fw fa-paint-brush"></i>
              </button>
              <div class="border-0 dropdown-menu dropdown-menu-end fs-sm" aria-labelledby="sidebar-themes-dropdown">
                <!-- Color Themes -->
                <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                <div class="text-center row g-sm">
                  <div class="mb-1 col-4">
                    <a class="py-3 text-white d-block fs-xs fw-semibold bg-default rounded-1" data-toggle="theme" data-theme="default" href="#">
                      Default
                    </a>
                  </div>
                  <div class="mb-1 col-4">
                    <a class="py-3 text-white d-block fs-xs fw-semibold bg-xwork rounded-1" data-toggle="theme" data-theme="assets/css/themes/xwork.min.css" href="#">
                      xWork
                    </a>
                  </div>
                  <div class="mb-1 col-4">
                    <a class="py-3 text-white d-block fs-xs fw-semibold bg-xmodern rounded-1" data-toggle="theme" data-theme="assets/css/themes/xmodern.min.css" href="#">
                      xModern
                    </a>
                  </div>
                  <div class="mb-1 col-4">
                    <a class="py-3 text-white d-block fs-xs fw-semibold bg-xeco rounded-1" data-toggle="theme" data-theme="assets/css/themes/xeco.min.css" href="#">
                      xEco
                    </a>
                  </div>
                  <div class="mb-1 col-4">
                    <a class="py-3 text-white d-block fs-xs fw-semibold bg-xsmooth rounded-1" data-toggle="theme" data-theme="assets/css/themes/xsmooth.min.css" href="#">
                      xSmooth
                    </a>
                  </div>
                  <div class="mb-1 col-4">
                    <a class="py-3 text-white d-block fs-xs fw-semibold bg-xinspire rounded-1" data-toggle="theme" data-theme="assets/css/themes/xinspire.min.css" href="#">
                      xInspire
                    </a>
                  </div>
                  <div class="mb-1 col-4">
                    <a class="py-3 text-white d-block fs-xs fw-semibold bg-xdream rounded-1" data-toggle="theme" data-theme="assets/css/themes/xdream.min.css" href="#">
                      xDream
                    </a>
                  </div>
                  <div class="mb-1 col-4">
                    <a class="py-3 text-white d-block fs-xs fw-semibold bg-xpro rounded-1" data-toggle="theme" data-theme="assets/css/themes/xpro.min.css" href="#">
                      xPro
                    </a>
                  </div>
                  <div class="mb-1 col-4">
                    <a class="py-3 text-white d-block fs-xs fw-semibold bg-xplay rounded-1" data-toggle="theme" data-theme="assets/css/themes/xplay.min.css" href="#">
                      xPlay
                    </a>
                  </div>
                  <div class="col-12">
                    <a class="py-2 d-block bg-body-dark fs-xs fw-semibold text-dark rounded-1" href="be_ui_color_themes.html">All Color Themes</a>
                  </div>
                </div>
                <!-- END Color Themes -->
              </div>
            </div> --}}

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
              <i class="fa fa-times-circle"></i>
            </button>
            <!-- END Close Sidebar -->
          </div>
          <!-- END Options -->
        </div>
      </div>
      <!-- END Side Header -->

      <!-- Sidebar Scrolling -->
      <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side content-side-full">
          <ul class="nav-main">
            <li class="nav-main-item">
              <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">
                <i class="nav-main-link-icon fa fa-location-arrow"></i>
                <span class="nav-main-link-name">Dashboard</span>
                <span class="nav-main-link-badge badge rounded-pill bg-primary">5</span>
              </a>
            </li>
            <li class="nav-main-heading">Almacen</li>
            <li class="nav-main-item{{ request()->routeIs('productos.*') || request()->routeIs('laboratorios.*') || request()->routeIs('categorias.*') || request()->routeIs('lineasFarmaceuticas.*') ? ' open' : '' }}">
              <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                <i class="nav-main-link-icon fa-solid fa-store"> </i>
                <span class="nav-main-link-name"> Almacen</span>
              </a>
              <ul class="nav-main-submenu">
                <li class="nav-main-item">
                  <a class="nav-main-link{{ request()->routeIs('productos.index') ? ' active' : '' }}" href="{{route('productos.index')}}">
                    <span class="nav-main-link-name">Productos</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link{{ request()->routeIs('laboratorios.index') || request()->routeIs('principios.*') || request()->routeIs('categorias.*') || request()->routeIs('lineasFarmaceuticas.*') ? ' active' : '' }}" href="{{route('laboratorios.index')}}">
                    <span class="nav-main-link-name">Datos del Producto</span>
                  </a>
                </li>
              </ul>
            </li>
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
              <i class="nav-main-link-icon fa fa-lightbulb"></i>
              <span class="nav-main-link-name">Productos</span>
            </a>
            <li class="nav-main-heading">More</li>
            <li class="nav-main-item">
              <a class="nav-main-link" href="/">
                <i class="nav-main-link-icon fa fa-globe"></i>
                <span class="nav-main-link-name">Landing</span>
              </a>
            </li>


            <li class="nav-main-item">
              <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                <span class="nav-main-link-name">e-Commerce</span>
              </a>
              <ul class="nav-main-submenu">
                <li class="nav-main-item">
                  <a class="nav-main-link" href="be_pages_ecom_dashboard.html">
                    <span class="nav-main-link-name">Dashboard</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="be_pages_ecom_orders.html">
                    <span class="nav-main-link-name">Orders</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="be_pages_ecom_order.html">
                    <span class="nav-main-link-name">Order</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link active" href="be_pages_ecom_products.html">
                    <span class="nav-main-link-name">Products</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="be_pages_ecom_product_edit.html">
                    <span class="nav-main-link-name">Product Edit</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="be_pages_ecom_customer.html">
                    <span class="nav-main-link-name">Customer</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- END Side Navigation -->
      </div>
      <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
      <!-- Header Content -->
      <div class="content-header">
        <!-- Left Section -->
        <div class="space-x-1">
          <!-- Toggle Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
          <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-fw fa-bars"></i>
          </button>
          <!-- END Toggle Sidebar -->

          <!-- Open Search Section -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="header_search_on">
            <i class="opacity-50 fa fa-fw fa-search"></i> <span class="ms-1 d-none d-sm-inline-block">Search</span>
          </button>
          <!-- END Open Search Section -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="space-x-1">
          <!-- User Dropdown -->
          <div class="dropdown d-inline-block">
            <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-user d-sm-none"></i>
              <span class="d-none d-sm-inline-block">{{ Auth::user()->name }}</span>
              <i class="opacity-50 fa fa-fw fa-angle-down ms-1 d-none d-sm-inline-block"></i>
            </button>
            <div class="p-0 dropdown-menu dropdown-menu-end" aria-labelledby="page-header-user-dropdown">
              <div class="p-3 text-center text-white bg-primary-dark rounded-top fw-semibold">
                User Options
              </div>
              <div class="p-2">
                <a class="dropdown-item" href="{{route('profile.edit')}}">
                  <i class="far fa-fw fa-user me-1"></i> Profile
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                  <span><i class="far fa-fw fa-envelope me-1"></i> Inbox</span>
                  <span class="badge bg-primary rounded-pill">3</span>
                </a>
                <a class="dropdown-item" href="javascript:void(0)">
                  <i class="far fa-fw fa-file-alt me-1"></i> Invoices
                </a>
                <div role="separator" class="dropdown-divider"></div>

                <!-- Toggle Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                  <i class="far fa-fw fa-building me-1"></i> Settings
                </a>
                <!-- END Side Overlay -->

                <div role="separator" class="dropdown-divider"></div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Sign Out
                  </a>
                </form>
              </div>
            </div>
          </div>
          <!-- END User Dropdown -->

          <!-- Notifications Dropdown -->
          <div class="dropdown d-inline-block">
            <button type="button" class="btn btn-alt-secondary" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-bell"></i>
            </button>
            <div class="p-0 dropdown-menu dropdown-menu-lg dropdown-menu-end" aria-labelledby="page-header-notifications-dropdown">
              <div class="p-3 text-center text-white bg-primary-dark rounded-top fw-semibold">
                Notifications
              </div>
              <ul class="my-2 nav-items">
                <li>
                  <a class="py-2 d-flex text-dark" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                      <i class="fa fa-fw fa-check-circle text-success"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                      <div class="fw-semibold">App was updated to v5.6!</div>
                      <div class="text-muted">3 min ago</div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="py-2 d-flex text-dark" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                      <i class="fa fa-fw fa-user-plus text-info"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                      <div class="fw-semibold">New Subscriber was added! You now have 2580!
                      </div>
                      <div class="text-muted">10 min ago</div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="py-2 d-flex text-dark" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                      <i class="fa fa-fw fa-times-circle text-danger"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                      <div class="fw-semibold">Server backup failed to complete!</div>
                      <div class="text-muted">30 min ago</div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="py-2 d-flex text-dark" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                      <i class="fa fa-fw fa-exclamation-circle text-warning"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                      <div class="fw-semibold">You are running out of space. Please consider
                        upgrading your plan.</div>
                      <div class="text-muted">1 hour ago</div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="py-2 d-flex text-dark" href="javascript:void(0)">
                    <div class="flex-shrink-0 mx-3">
                      <i class="fa fa-fw fa-plus-circle text-primary"></i>
                    </div>
                    <div class="flex-grow-1 fs-sm pe-2">
                      <div class="fw-semibold">New Sale! + $30</div>
                      <div class="text-muted">2 hours ago</div>
                    </div>
                  </a>
                </li>
              </ul>
              <div class="p-2 border-top">
                <a class="text-center btn btn-alt-primary w-100" href="javascript:void(0)">
                  <i class="opacity-50 fa fa-fw fa-eye me-1"></i> View All
                </a>
              </div>
            </div>
          </div>
          <!-- END Notifications Dropdown -->

          <!-- Toggle Side Overlay -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="side_overlay_toggle">
            <i class="far fa-fw fa-list-alt"></i>
          </button>
          <!-- END Toggle Side Overlay -->
        </div>
        <!-- END Right Section -->
      </div>
      <!-- END Header Content -->

      <!-- Header Search -->
      <div id="page-header-search" class="overlay-header bg-header-dark">
        <div class="content-header">
          <form class="w-100" action="/dashboard" method="POST">
            @csrf
            <div class="input-group">
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <button type="button" class="btn btn-alt-primary" data-toggle="layout" data-action="header_search_off">
                <i class="fa fa-fw fa-times-circle"></i>
              </button>
              <input type="text" class="border-0 form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
            </div>
          </form>
        </div>
      </div>
      <!-- END Header Search -->

      <!-- Header Loader -->
      <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
      <div id="page-header-loader" class="overlay-header bg-header-dark">
        <div class="bg-white-10">
          <div class="content-header">
            <div class="text-center w-100">
              <i class="text-white fa fa-fw fa-sun fa-spin"></i>
            </div>
          </div>
        </div>
      </div>
      <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
      @yield('content')
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
      <div class="py-0 content">
        <div class="row fs-sm">
          <div class="mb-1 text-center col-sm-6 order-sm-2 mb-sm-0 text-sm-end">
            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://pixelcave.com" target="_blank">pixelcave</a>
          </div>
          <div class="text-center col-sm-6 order-sm-1 text-sm-start">
            <a class="fw-semibold" href="https://pixelcave.com/products/dashmix" target="_blank">Dashmix</a> &copy;
            <span data-toggle="year-copy"></span>
          </div>
        </div>
      </div>
    </footer>
    <!-- END Footer -->
  </div>
  <!-- END Page Container -->
  @stack('js')
</body>

</html>
