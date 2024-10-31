<div>
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
    <script type="module">
        import { handleResponse, handleError, tiempoEstandar, clearErrors } from "{{ asset('js/axios/axiosHelper.js')}}";
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('modal-linea-farmaceutica'));
            const saveLocalstorage = @json($saveLocalstorage);
            const formName = "{{ $formName }}";

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
                        if (saveLocalstorage) {
                            console.log("jeje holiii");
                        } else {
                            window.location.reload(); // Recarga la página
                        }
                    });
                })
                .catch(error => {
                    handleError(error, "{{ Auth::user()->name }}", "formulario-linea-farmaceutica"); // Manejar el error
                });
            });

            //Borrar y resetear formulario al cerrar el formulario
            document.getElementById('modal-linea-farmaceutica').addEventListener('hidden.bs.modal', function() {
                clearErrors('formulario-linea-farmaceutica');
                document.getElementById('formulario-linea-farmaceutica').reset();
            });
        });
    </script>
@endpush