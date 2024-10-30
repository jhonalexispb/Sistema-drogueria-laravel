<div>
    <button type="button" class="mb-2 text-white btn bg-gd-sea-op" id="crear-principio-activo"><i class="si si-plus"></i> Crear principio activo</button>
    <!-- Pop Out Default Modal -->
    <div class="modal fade" id="modal-principio-activo" tabindex="-1" role="dialog" aria-labelledby="modal-principio-activo"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Principio Activo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="pb-1 modal-body">
                    <form class="mb-4" action="{{route('principiosActivos.store')}}" method="POST" id="formulario-principio-activo" onsubmit="return false;">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label" for="nombre">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="justify-content-between d-flex">
                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="registrar-principio-activo">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Pop Out Default Modal -->
</div>

@push('js')
    @vite(['resources/js/bootstrap.js','resources/js/pages/lottie-lordicon.js'])
    <script type="module">
        import { handleResponse, handleError, tiempoEstandar, clearErrors } from "{{ asset('js/axios/axiosHelper.js')}}";
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('modal-principio-activo'));

            document.getElementById('crear-principio-activo').addEventListener('click', function() {
                modal.show();
            });

            document.getElementById('registrar-principio-activo').addEventListener('click', function() {
                const formData = new FormData(document.getElementById('formulario-principio-activo'));
                axios.post('{{ route('principiosActivos.store') }}', formData, tiempoEstandar)
                .then(response => {
                    const data = handleResponse(response); // Manejar la respuesta
                    modal.hide();
                    Swal.fire({
                        html: `<lord-icon src='{{asset('media/gif/confetti.json') }}' trigger='loop' style='width: 200px; height: 200px;'></lord-icon> <br> ${data.success}`,
                        title: "¡Buen trabajo {{ Auth::user()->name }}!",
                        showCloseButton: true,
                        backdrop: true,
                    }).then(() => {
                        window.location.reload(); // Recarga la página después de cerrar el modal
                    });
                })
                .catch(error => {
                    handleError(error, "{{ Auth::user()->name }}","formulario-principio-activo"); // Manejar el error
                });
            });

            //Borrar y resetear formulario al cerrar el formulario
            document.getElementById('modal-principio-activo').addEventListener('hidden.bs.modal', function() {
                clearErrors('formulario-principio-activo');
                document.getElementById('formulario-principio-activo').reset();
            });
        });
    </script>
@endpush