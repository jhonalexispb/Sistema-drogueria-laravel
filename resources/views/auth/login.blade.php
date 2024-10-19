<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
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
  @vite(['resources/sass/main.scss'/* , 'resources/js/dashmix/app.js' */])
  <script src="{{ asset('js/setTheme.js') }}"></script>
</head>

<div id="page-container">
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!-- Main Container -->
    <main id="main-container">
      <!-- Page Content -->
      <div class="bg-image" style="background-image: url('{{asset('media/photos/photo222x.jpg')}}');">
        <div class="row g-0 bg-primary-op">
          <!-- Main Section -->
          <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
            <div class="p-3 w-100">
              <!-- Header -->
              <div class="mb-3 text-center">
                <a class="link-fx fw-bold fs-1" href="index.html">
                  <span class="text-dark">Bo</span><span class="text-primary">ned</span>
                </a>
                <p class="text-uppercase fw-bold fs-sm text-muted">Sign In</p>
              </div>
          
              <div class="row g-0 justify-content-center">
                <div class="col-sm-8 col-xl-6">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="py-3">
                      <div class="mb-4">
                        <input type="text" class="form-control form-control-lg form-control-alt" id="email" name="email" placeholder="Username" required autofocus autocomplete="username">
                        <x-input-error :messages="$errors->get('email', __('Correo electrónico inválido.'))" class="mt-2" />
                      </div>
                      <div class="mb-4">
                        <input type="password" class="form-control form-control-lg form-control-alt" id="password" name="password" placeholder="Password" autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                      </div>
                    </div>
                    <div class="mb-4">
                      <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                        <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> {{ __('Log in') }}
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- END Sign In Form -->
            </div>
          </div>
          <!-- END Main Section -->
          <!-- Meta Info Section -->
          <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
            <div class="p-3">
              <p class="display-4 fw-bold text-white mb-3">
                Welcome
              </p>
              <p class="fs-lg fw-semibold text-white-75 mb-0">
                Buena suerte <span data-toggle="year-copy"></span>
              </p>
            </div>
          </div>
          <!-- END Meta Info Section -->
        </div>
      </div>
      <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
  </div>
