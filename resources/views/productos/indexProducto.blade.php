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
            <div class="mb-0 col-md-6 col-xl-4">
                <a class="block block-rounded block-link-pop bg-xsmooth" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div class="item">
                            <i class="fa fa-3x fa-solid fa-box text-xsmooth-lighter"></i>
                        </div>
                        <div class="ms-3 text-end">
                            <p class="mb-0 text-white fs-lg fw-semibold">
                                {{ $totalProductos }}
                            </p>
                            <p class="mb-0 text-white-75">
                                productos en total
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="mb-0 col-md-6 col-xl-4">
                <a class="block block-rounded block-link-pop bg-gd-primary" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div class="item">
                            <i class="fa fa-3x fa-solid fa-box-open"></i>
                            <i class="fa fa-solid fa-times-circle "></i>
                        </div>
                        <div class="ms-3 text-end">
                            <p class="mb-0 text-white fs-lg fw-semibold">
                                {{ $productosFueraDeStock }}
                            </p>
                            <p class="mb-0 text-white-75">
                                Fuera de stock
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- END Quick Overview -->

        <!-- All Products -->
        <div class="block block-rounded">
            <div class="block-content bg-body-dark">
                <!-- Search Form -->
                <form action="{{ route('productos.index') }}" method="GET" {{-- onsubmit="return false;" --}}>
                    <div class="mb-4 input-group">
                        <input type="text" class="form-control form-control-alt" id="dm-ecom-products-search"
                            name="busqueda" placeholder="Busca cualquier producto.." value="{{ request('busqueda') }}"
                            autocomplete="off">
                        <button type="submit" class="btn btn-primary submit-button">Buscar</button>
                    </div>
                </form>
                <!-- END Search Form -->
            </div>

            <!-- All Products Table -->
            <div class="overflow-x-auto block-content">
                <a href="{{ route('productos.create') }}" class="mb-2 text-white btn bg-gd-sea-op" id="crear-linea-farmaceutica"><i class="si si-plus"></i> Crear Producto</a>
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
                                        <strong>{{ $p->id }}</strong>
                                    </a>
                                </td>
                                <td class="text-center fs-sm">{{ $p->nombre . ' ' . $p->caracteristica }}</td>
                                <td class="fs-sm">
                                    <a class="fw-semibold" href="be_pages_ecom_product_edit.html">S/
                                        {{ $p->precio }}</a>
                                </td>
                                <td class="text-center fs-sm">
                                    <strong>{{ $p->stock }}</strong>
                                </td>
                                <td class="text-center fs-sm">
                                    <div class="btn-group" role="group" aria-label="Horizontal Primary">
                                        <a class="btn btn-alt-secondary push mb-md-0"
                                            href="{{ route('productos.show', $p->id) }}">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </a>
                                        <a class="btn btn-alt-secondary push mb-md-0"
                                            href="{{ route('productos.edit', $p->id) }}">
                                            <i class="fa fa-fw fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('productos.destroy', $p->id) }}" class="js-swal-confirm"
                                            data-element-item="{{ $p->nombre . ' ' . $p->caracteristica }}" method="POST">
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
    @vite(['resources/js/pages/datatables.js', 'resources/js/pages/sweetAlert2.js'])
    <script src="{{ asset('js/plugins/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>


    <script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "¡Buen trabajo!",
                    text: "{{ session('success') }}",
                    icon: "success"
                });
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const submitButton = document.querySelector('.submit-button');
            submitButton.addEventListener('click', function(event) {
                this.disabled = true; // Deshabilitar el botón
                this.innerText = 'Buscando...'; // Cambia el texto del botón
                const form = this.closest('form');
                if (form) {
                    form.submit(); // Envía el formulario
                }
            });
        });
    </script>
@endsection
