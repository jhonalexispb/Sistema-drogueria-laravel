@extends('layouts.backend')
@section('css')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
    <x-navegacion-horizontal />
    <div class="content">
        <!-- Quick Overview -->
        <div class="row items-push">
            <div class="mb-0 col-md-6 col-xl-4">
                <a class="block block-rounded block-link-pop bg-gd-primary" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div class="item">
                            <i class="text-white-75 fa fa-3x fa-tv"></i>
                        </div>
                        <div class="ms-3 text-end">
                            <p class="mb-0 text-white fs-lg fw-semibold">
                                {{ $totalPrincipiosActivos }}
                            </p>
                            <p class="mb-0 text-white-75">
                                Principios Activos en total
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="mb-0 col-md-6 col-xl-4">
                <a class="block block-rounded block-link-pop bg-xsmooth" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div class="item">
                            <i class="fa fa-3x fa-solid fa-medal text-xsmooth-lighter"></i>
                        </div>
                        <div class="ms-3 text-end">
                            <p class="mb-0 text-white fs-lg fw-semibold">
                                {{ $totalPrincipiosActivos }} Productos
                            </p>
                            <p class="mb-0 text-white-75">
                                llevan dexametasona
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
                <form action="{{ route('principiosActivos.index') }}" method="GET">
                    <div class="mb-4 input-group">
                        <input type="text" class="form-control form-control-alt" id="dm-ecom-products-search"
                            name="busqueda" placeholder="Busca cualquier principio..." value="{{ request('busqueda') }}"
                            autocomplete="off">
                        <button type="submit" class="btn btn-primary submit-button">Buscar</button>
                    </div>
                </form>
                <!-- END Search Form -->
            </div>
            <!-- All Products Table -->
            <div class="overflow-x-auto block-content">
                <x-principio-activo.boton-crear-principio-activo />
                <table class="table mb-3 table-bordered table-striped table-vcenter js-dataTable-responsive ">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">Codigo</th>
                            <th class="text-center" style="width: 100px;">Nombre</th>
                            <th class="text-center" style="width: 100px;">Concentracion</th>
                            <th class="text-center" style="width: 100px;">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($principiosActivos as $p)
                            <tr>
                                <td class="text-center fs-sm">{{ $p->id }}</td>
                                <td class="text-center fs-sm">{{ $p->nombre }}</td>
                                <td class="text-center fs-sm">{{ $p->concentracion }}</td>
                                <td class="text-center fs-sm">
                                    <div class="btn-group" role="group" aria-label="Horizontal Primary">
                                        <x-principio-activo.boton-edicion-principio-activo :idPrincipioActivo="$p->id"/>
                                        <form action="{{route('principiosActivos.destroy',$p->id)}}" class="js-swal-confirm-modal" data-element-item="{{ $p->nombre }}" method="POST">
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
                {{ $principiosActivos->links() }}
            </div>
        </div>
    </div>
    <x-principio-activo.formulario-edicion-principio-activo/>
    <x-principio-activo.formulario-creacion-principio-activo />
@endsection
@section('js')
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    @vite(['resources/js/pages/datatables.js', 'resources/js/pages/sweetAlert2.js', 'resources/js/bootstrap.js', 'resources/js/pages/lottie-lordicon.js'])
    <script src="{{ asset('js/plugins/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    @if(@session('info'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "¡Bien hecho {{ Auth::user()->name }}!",
                    html: `<lord-icon src='media/gif/borrado exitoso.json' trigger='loop' style='width: 200px; height: 200px;'></lord-icon> <br> {{ session('info')}}`,
                    showCloseButton: true,
                    backdrop: true,
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
