@extends('layouts.backend')
@section('css')
  <!-- Page JS Plugins CSS -->
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
    <div class="content">
        <!-- Quick Overview -->
        <div class="row items-push">
            <div class="col-lg-4">
                <a class="block mb-0 text-center block-rounded block-link-shadow h-100"
                    href="{{route('productos.create')}}">
                    <div class="py-5 block-content">
                        <div class="mb-1 fs-3 fw-semibold text-success">
                            <i class="fa fa-plus"></i>
                        </div>
                        <p class="mb-0 fw-semibold fs-sm text-success text-uppercase">
                            Crear Producto
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-4">
                <a class="block mb-0 text-center block-rounded block-link-shadow h-100" href="javascript:void(0)">
                    <div class="py-5 block-content">
                        <div class="mb-1 fs-3 fw-semibold text-danger">{{$productosFueraDeStock}}</div>
                        <p class="mb-0 fw-semibold fs-sm text-danger text-uppercase">
                            Fuera de stock
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-4">
                <a class="block mb-0 text-center block-rounded block-link-shadow h-100" href="javascript:void(0)">
                    <div class="py-5 block-content">
                        <div class="mb-1 fs-3 fw-semibold text-dark">{{$totalProductos}}</div>
                        <p class="mb-0 fw-semibold fs-sm text-muted text-uppercase">
                            productos en total
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <!-- END Quick Overview -->

        <!-- All Products -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">All Products</h3>
                <div class="block-options">
                    <div class="dropdown">
                        <button type="button" class="btn btn-alt-secondary" id="dropdown-ecom-filters"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filters <i class="fa fa-angle-down ms-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters">
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                New
                                <span class="badge bg-success rounded-pill">260</span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                Out of Stock
                                <span class="badge bg-danger rounded-pill">63</span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                All
                                <span class="badge bg-black-50 rounded-pill">36k</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-content bg-body-dark">
                <!-- Search Form -->
                <form action="{{route('productos.index')}}" method="GET" {{-- onsubmit="return false;" --}}>
                  <div class="mb-4 input-group">
                      <input type="text" class="form-control form-control-alt" id="dm-ecom-products-search"
                          name="busqueda" placeholder="Search all products.." value="{{request('busqueda')}}" autocomplete="off">
                      <button type="submit" class="btn btn-primary">Buscar</button>
                  </div>
                </form>
                <!-- END Search Form -->
            </div>
            
            <!-- All Products Table -->
            <div class="overflow-x-auto block-content">
              <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive ">
                  <thead>
                      <tr>
                          <th class="text-center" style="width: 100px;">Codigo</th>
                          <th class="text-center">Nombre</th>
                          <th>Precio</th>
                          <th class="text-end">Stock</th>
                          <th class="text-center" style="width: 100px;">Opciones</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($productos as $p)
                    <tr>
                        <td class="text-center fs-sm">
                            <a class="fw-semibold" href="be_pages_ecom_product_edit.html">
                                <strong>{{$p->id}}</strong>
                            </a>
                        </td>
                        <td class="text-center fs-sm">{{$p->nombre. ' ' .$p->caracteristica}}</td>
                        <td class="fs-sm">
                            <a class="fw-semibold" href="be_pages_ecom_product_edit.html">S/ {{$p->precio}}</a>
                        </td>
                        <td class="text-center fs-sm">
                            <strong>{{$p->stock}}</strong>
                        </td>
                        <td class="text-center fs-sm">
                            <div class="btn-group" role="group" aria-label="Horizontal Primary">
                                <a class="btn btn-alt-secondary push mb-md-0" href="{{route('productos.show',$p->id)}}">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>
                                <a class="btn btn-alt-secondary push mb-md-0" href="{{route('productos.edit',$p->id)}}">
                                    <i class="fa fa-fw fa-pen-to-square"></i>
                                </a>

                                <form action="{{route('productos.destroy',$p->id)}}" class="js-swal-confirm" data-product-name="{{ $p->nombre }}" data-product-id="{{ $p->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-alt-secondary push mb-md-0">
                                        <i class="far fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
              {{ $productos->links() }}
            </div>
            <!-- END All Products Table -->
        </div>
        <!-- END All Products -->
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    @vite(['resources/js/pages/datatables.js','resources/js/pages/sweetAlert2.js'])

    <script src="{{ asset('js/plugins/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success"
                });
            });
        </script>
    @endif
@endsection