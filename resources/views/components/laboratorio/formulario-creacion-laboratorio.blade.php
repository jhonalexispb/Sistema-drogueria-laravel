<div>
    <div class="modal fade" id="modal-laboratorio" tabindex="-1" role="dialog" aria-labelledby="modal-laboratorio"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Laboratorio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="pb-1 modal-body">
                    <form class="mb-4" action="{{route('laboratorios.store')}}" method="POST" id="formulario-laboratorio" onsubmit="return false;">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label" for="codigo">Codigo</label>
                            <input type="number" class="form-control" id="codigo" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="nombre">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="margen_minimo">Margen Mínimo <span class="text-danger">*</span></label>
                            <input type="number" width="100%" class="form-control" id="margen_minimo" name="margen_minimo" placeholder="%">
                        </div>
                        <div class="justify-content-between d-flex">
                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="registrar-lab">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script type="module">
        import { handleError, tiempoEstandar, clearErrors } from "{{ asset('js/axios/axiosHelper.js')}}";
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('modal-laboratorio'));

            document.getElementById('registrar-lab').addEventListener('click', function() {
                const formData = new FormData(document.getElementById('formulario-laboratorio'));
                axios.post('{{ route('laboratorios.store') }}', formData, tiempoEstandar)
                .then(response => {
                    const data = response.data; // Manejar la respuesta
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
                    handleError(error, "{{ Auth::user()->name }}", 'modal-laboratorio'); // Manejar el error
                });
            });

            //Borrar y resetear formulario al cerrar el formulario
            document.getElementById('modal-laboratorio').addEventListener('hidden.bs.modal', function() {
                clearErrors('formulario-laboratorio');
                document.getElementById('formulario-laboratorio').reset();
            });
        });
    </script>
@endpush