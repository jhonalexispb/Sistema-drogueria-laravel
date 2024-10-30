<div>
    <button type="button" class="mb-2 text-white btn bg-gd-sea-op" id="crear-linea-farmaceutica"><i class="si si-plus"></i> Crear linea farmaceutica</button>
    <!-- Pop Out Default Modal -->
    <div class="modal fade" id="modal-linea-farmaceutica" tabindex="-1" role="dialog" aria-labelledby="modal-linea-farmaceutica"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Linea Farmaceutica</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="pb-1 modal-body">
                    <form class="mb-4" action="{{route('lineasFarmaceuticas.store')}}" method="POST" id="formulario-linea-farmaceutica" onsubmit="return false;">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label" for="nombre">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="justify-content-between d-flex">
                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="registrar-linea-farmaceutica">Registrar</button>
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
        import { handleResponse, handleError, tiempoEstandar } from "{{ asset('js/axios/axiosHelper.js')}}";
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('modal-linea-farmaceutica'));

            document.getElementById('crear-linea-farmaceutica').addEventListener('click', function() {
                modal.show();
            });

            document.getElementById('registrar-linea-farmaceutica').addEventListener('click', function() {
                const formData = new FormData(document.getElementById('formulario-linea-farmaceutica'));
                axios.post('{{ route('lineasFarmaceuticas.store') }}', formData, tiempoEstandar)
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
                    handleError(error, "{{ Auth::user()->name }}"); // Manejar el error
                });
            });

            //Borrar y resetear formulario al cerrar el formulario
            document.getElementById('modal-linea-farmaceutica').addEventListener('hidden.bs.modal', function() {
                limpiarErrores();
                document.getElementById('formulario-linea-farmaceutica').reset();
            });
            
            //funcion para eliminar errores
            function limpiarErrores() {
                const errorMessages = document.querySelectorAll('.text-danger');
                errorMessages.forEach((msg) => {
                    msg.remove();
                });
            }
        });
    </script>
@endpush