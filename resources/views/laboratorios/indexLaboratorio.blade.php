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
    {{-- <div id="session-timer"></div> --}}
    <div class="content">
        <!-- Quick Overview -->
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
        <!-- END Quick Overview -->

        <!-- All Products -->
        <div class="block block-rounded">
            <div class="block-content bg-body-dark">
                <form action="{{ route('laboratorios.index') }}" method="GET">
                    <div class="mb-4 input-group">
                        <input type="text" class="form-control form-control-alt" id="dm-ecom-products-search"
                            name="busqueda" placeholder="Search all products.." value="{{ request('busqueda') }}"
                            autocomplete="off">
                        <button type="submit" class="btn btn-primary submit-button">Buscar</button>
                    </div>
                </form>
            </div>

            <!-- All Products Table -->
            <div class="overflow-x-auto block-content">
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
                        @foreach ($laboratorios as $p)
                            <tr>
                                <td class="text-center fs-sm">{{ $p->codigo }}</td>
                                <td class="text-center fs-sm">{{ $p->nombre }}</td>
                                <td class="text-center fs-sm">% {{ $p->margen_minimo }}</td>
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
                                        <form action="{{ route('productos.destroy', $p->id) }}" class="js-swal-confirm-modal"
                                            data-element-item="{{ $p->nombre . ' ' . $p->caracteristica }}"
                                            data-product-id="{{ $p->id }}" method="POST">
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

            /* const sessionLifetime = {{ config('session.lifetime') }} * 60 * 1000;
            const sessionExpireTime = Date.now() + sessionLifetime;

            function updateSessionTimer() {
                const now = Date.now();
                const timeRemaining = sessionExpireTime - now;

                const minutes = Math.floor((timeRemaining / 1000 / 60) % 60);
                const seconds = Math.floor((timeRemaining / 1000) % 60);
                document.getElementById('session-timer').textContent = `Tiempo restante: ${minutes}m ${seconds}s`;
            }

            const timerInterval = setInterval(updateSessionTimer, 1000);
            updateSessionTimer(); */
            });
    </script>
@endsection
