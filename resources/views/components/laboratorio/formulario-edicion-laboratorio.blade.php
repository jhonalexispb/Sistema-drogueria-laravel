<div>
    <div class="modal fade" id="modal-edicion-laboratorio" tabindex="-1" role="dialog" aria-labelledby="modal-edicion-laboratorio" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Laboratorio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="pb-1 modal-body">
                    <form class="mb-4" method="POST" id="formulario-edicion-laboratorio" onsubmit="return false;">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label" for="e_codigo">Codigo</label>
                            <input type="number" class="form-control" id="e_codigo" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="e_nombre">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="e_nombre" name="nombre">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="e_margen_minimo">Margen Mínimo <span class="text-danger">*</span></label>
                            <input type="number" width="100%" class="form-control" id="e_margen_minimo" name="margen_minimo" placeholder="%">
                        </div>
                        <div class="justify-content-between d-flex">
                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="registrar-edicion-lab" data-id="">Guardar</button>
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
            const modaleditar = new bootstrap.Modal(document.getElementById('modal-edicion-laboratorio'));
            
            document.getElementById('registrar-edicion-lab').addEventListener('click', function() {
                //Deshabilitamos el boton
                const editButton = this; // Usar el botón que disparó el evento
                editButton.disabled = true;
                editButton.textContent = 'Guardando...';

                //Preparamos la data
                const labId = this.getAttribute('data-id');
                const formData = new FormData(document.getElementById('formulario-edicion-laboratorio'));
                
                //Realizamos la petición PUT para guardar los cambios
                axios.post(`/laboratorios/${labId}`, formData, tiempoEstandar)
                .then(response => {
                    const data = response.data;
                    modaleditar.hide();
                    
                    Swal.fire({
                        html: `<lord-icon src='{{asset('media/gif/confetti.json') }}' trigger='loop' style='width: 200px; height: 200px;'></lord-icon> <br> ${data.success}`,
                        title: "¡Buen trabajo {{ Auth::user()->name }}!",
                        showCloseButton: true,
                        backdrop: true,
                    }).then(() => {
                        window.location.reload();
                    });
                })
                .catch(error => {
                    handleError(error, "{{ Auth::user()->name }}", 'formulario-edicion-laboratorio');
                })
                .finally(() =>{
                    editButton.disabled = false;
                    editButton.textContent = 'Guardar';
                });
            });

            //Borrar y resetear formulario al cerrar el modal
            document.getElementById('modal-edicion-laboratorio').addEventListener('hidden.bs.modal', function() {
                clearErrors('formulario-edicion-laboratorio');
                document.getElementById('formulario-edicion-laboratorio').reset();
            });
        });
    </script>
@endpush