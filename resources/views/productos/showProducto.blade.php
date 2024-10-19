@extends('layouts.backend')
@section('content')
    <div class="block-content">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <!-- With Indicators -->
                        <div class="block block-rounded">
                            <div id="carouselExampleIndicators" class="carousel slide carousel-fade">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('media/photos/photo7.jpg') }}" class="d-block w-100"
                                            alt="Carousel Image 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('media/photos/photo8.jpg') }}" class="d-block w-100"
                                            alt="Carousel Image 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('media/photos/photo9.jpg') }}" class="d-block w-100"
                                            alt="Carousel Image 1">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <!-- END With Indicators -->
                    </div>
                    <div class="card-footer border-top">
                        <div class="row g-2">
                            <div class="col">
                                <a href="#!"
                                    class="btn btn-primary d-flex align-items-center justify-content-center gap-2 w-100">
                                    <i class="bx bx-cart fs-18"></i> Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h2>{{$producto->nombre.' '.$producto->caracteristica}}</h2>
                        <div class="d-flex justify-content-between">
                            <h2 class="text-dark fw-medium">S/ {{$producto->precio}}</h2>
                            <h2 class="text-dark fw-medium">Stock: {{$producto->stock}}</h2>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="p-1">
                                <h4 class="text-dark fw-medium">Lotes con stock:</h4>
                                <ul>
                                    <li>2112DD</li>
                                </ul>
                            </div>
                        </div>
                        <h4 class="text-dark fw-medium mt-3">Description:</h4>
                        <p class="text-muted">{{$producto->caracteristica}}</p>
                        <h4 class="text-dark fw-medium mt-3">Principios Activos:</h4>
                            <ul>
                                <li>Paracetamol</li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Orders Overview -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Orders Overview</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- Chart.js is initialized in js/pages/be_pages_ecom_dashboard.min.js which was auto compiled from _js/pages/be_pages_ecom_dashboard.js) -->
                <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                <canvas id="js-chartjs-overview" style="height: 420px;"></canvas>
            </div>
        </div>
        <!-- END Orders Overview -->
    </div>
@endsection
@section('js')
  @vite('resources/js/pages/chartOverview.js')

  <!-- Page JS Plugins -->
  <script src="{{ asset('js/plugins/chart.js/chart.umd.js') }}"></script>

  <!-- Page JS Code -->
  {{-- <script src="{{ asset('js/pages/be_pages_ecom_dashboard.min.js') }}"></script> --}}
@endsection
