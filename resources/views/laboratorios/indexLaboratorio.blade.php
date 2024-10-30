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
        <div class="row items-push">
            <div class="mb-0 col-md-6 col-xl-4">
                <a class="block block-rounded block-link-pop bg-gd-primary" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div class="item">
                            <i class="fa fa-3x fa-solid fa-medal text-white-75"></i>
                        </div>
                        <div class="ms-3 text-end">
                            <p class="mb-0 text-white fs-lg fw-semibold">
                                Otarvasq
                            </p>
                            <p class="mb-0 text-white-75">
                                es el laboratorio más vendido
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="mb-0 col-md-6 col-xl-4">
                <a class="block block-rounded block-link-pop bg-xsmooth" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div class="item">
                            <i class="text-white-75 fa fa-3x fa-tv"></i>
                        </div>
                        <div class="ms-3 text-end">
                            <p class="mb-0 text-white fs-lg fw-semibold">
                                {{ $totalLaboratorios }}
                            </p>
                            <p class="mb-0 text-white-75">
                                Laboratorios en total
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="block block-rounded">
            <div class="block-content bg-body-dark">
                <form action="{{ route('laboratorios.index') }}" method="GET">
                    <div class="mb-4 input-group">
                        <input type="text" class="form-control form-control-alt" name="busqueda" placeholder="Busca algun laboratorio.." value="{{ request('busqueda') }}" autocomplete="off">
                        <button type="submit" class="btn btn-primary submit-button">Buscar</button>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto block-content">
                <x-laboratorio.boton-crear-laboratorio />
                <x-laboratorio.formulario-creacion-laboratorio />
                <table class="table mb-2 table-bordered table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">Codigo</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Margen Minimo</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laboratorios as $v)
                            <tr>
                                <td class="text-center fs-sm">{{ $v->codigo }}</td>
                                <td class="text-center fs-sm">{{ $v->nombre }}</td>
                                <td class="text-center fs-sm">% {{ $v->margen_minimo }}</td>
                                <td class="text-center fs-sm">
                                    <div class="btn-group" role="group" aria-label="Horizontal Primary">
                                        <x-laboratorio.boton-edicion-laboratorio :idLaboratorio="$v->id" />
                                        <form action="{{ route('laboratorios.destroy', $v->id) }}" class="js-swal-confirm-modal" data-element-item="{{ $v->nombre }}" method="POST">
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
                {{ $laboratorios->links() }}
            </div>
        </div>
    </div>
    <x-laboratorio.formulario-edicion-laboratorio/>
@endsection
@section('js')
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    @vite(['resources/js/pages/datatables.js', 'resources/js/pages/sweetAlert2.js'])
    <script src="{{ asset('js/plugins/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

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
@endsection
