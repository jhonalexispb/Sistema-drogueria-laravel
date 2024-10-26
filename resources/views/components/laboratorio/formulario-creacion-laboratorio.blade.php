<div>
    <button type="button" class="mb-2 text-white btn bg-gd-sea-op" id="crear-lab"><i class="si si-plus"></i> Crear laboratorio</button>
    <!-- Pop Out Default Modal -->
    <div class="modal fade" id="modal-default-popout" tabindex="-1" role="dialog" aria-labelledby="modal-default-popout"
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
                            <button type="button" class="btn btn-primary" id="registrar-lab" {{-- data-bs-dismiss="modal" --}}>Registrar</button>
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
        import { handleResponse, handleError } from "{{ asset('js/axios/axiosHelper.js')}}";
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('modal-default-popout'));

            document.getElementById('crear-lab').addEventListener('click', function() {
                const createButton = this; // Usar el botón que disparó el evento
                createButton.disabled = true;
                createButton.textContent = 'Generando formulario...';

                // Usamos axios para traer el nuevo código del laboratorio
                axios.get('/laboratorios/siguiente-codigo', { timeout: 15000 })
                    .then(response => {
                        const data = handleResponse(response); // Manejar la respuesta
                        document.getElementById('codigo').value = data.codigo;
                        modal.show();
                    })
                    .catch(error => {
                        handleError(error); // Manejar el error
                    })
                    .finally(() => {
                        // Restaurar el botón y ocultar mensaje de carga
                        createButton.disabled = false;
                        createButton.textContent = '';

                        // Crear y agregar el ícono y texto
                        const icon = document.createElement('i');
                        icon.className = 'si si-plus';
                        createButton.appendChild(icon);
                        createButton.append(' Crear laboratorio');
                    });
            });

            document.getElementById('registrar-lab').addEventListener('click', function() {
                const formData = new FormData(document.getElementById('formulario-laboratorio'));
                axios.post('{{ route('laboratorios.store') }}', formData)
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
                        handleError(error); // Manejar el error
                    });
            });


            document.getElementById('registrar-lab').addEventListener('click', function() {
                const formData = new FormData(document.getElementById('formulario-laboratorio'));
                axios.post('{{ route('laboratorios.store') }}', formData)
                .then(function(response) {
                    modal.hide();
                    Swal.fire({
                        html: `<lord-icon src='{{asset('media/gif/confetti.json') }}' trigger='loop' style='width: 200px; height: 200px;'></lord-icon> <br> ${response.data.success}`,
                        title: "¡Buen trabajo {{ Auth::user()->name }}!",
                        showCloseButton: true,
                        backdrop: true,
                    }).then(() => {
                        window.location.reload(); // Recarga la página después de cerrar el modal
                    });
                })
                .catch(function(error) {
                    let errorMessage = "¡Ups! Algo salió mal. Por favor, inténtalo de nuevo.";
                    let errorIcon = "<lord-icon src='{{asset('media/gif/error de conexion.json') }}' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";

                    if (error.response) {
                        switch (error.response.status) {
                            case 400:
                                errorMessage = `Error ${error.response.status}: Parece que hubo un error en la solicitud.`;
                                errorIcon = "<lord-icon src='{{asset('media/gif/error 400.json') }}' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
                                break;
                            case 401:
                            case 419:
                                window.location.href = '{{ route('login') }}';
                                return; // Salimos del catch
                            case 422:
                                clearErrors()
                                const errors = error.response.data.errors;
                                for (const field in errors) {
                                    const errorMessage = errors[field][0];
                                    const input = document.querySelector(`[name="${field}"]`);
                                    const errorDiv = document.createElement('span');
                                    errorDiv.className = 'text-danger';
                                    errorDiv.textContent = errorMessage;
                                    input.parentNode.insertBefore(errorDiv, input.nextSibling);
                                }
                                errorMessage = "{{ Auth::user()->name }}, completa todos los campos correctamente por favor :)";
                                errorIcon = "<lord-icon src='{{asset('media/gif/formulario invalido.json') }}' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
                                break;
                            case 500:
                                errorMessage = "Hay un problema con el servidor. Estamos trabajando para solucionarlo.";
                                errorIcon = "<lord-icon src='{{asset('media/gif/error 500.json') }}' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
                                break;
                            default:
                                errorMessage = `Error ${error.response.status}: Ocurrió un problema inesperado.`;
                                errorIcon = "<lord-icon src='{{asset('media/gif/error de conexion.json') }}' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
                        }
                    } else if (error.request) {
                        // La solicitud fue hecha, pero no se recibió respuesta
                        errorMessage = "La conexión está tardando más de lo esperado. Por favor, verifica tu conexión a Internet.";
                        errorIcon = "<lord-icon src='{{asset('media/gif/carga lenta.json') }}' trigger='loop' style='width: 200px; height: 200px;'></lord-icon>";
                    } else {
                        errorMessage = "Hubo un problema al configurar la solicitud: " + error.message;
                    }

                    // Mostrar el mensaje de error al usuario
                    Swal.fire({
                        title: "¡Oops!",
                        html: `${errorIcon} <br> ${errorMessage}`, // Usa html para incluir el ícono
                        showCloseButton: true,
                        backdrop: true,
                    });
                })
            }); */

            //Borrar y resetear formulario al cerrar el formulario
            document.getElementById('modal-default-popout').addEventListener('hidden.bs.modal', function() {
                clearErrors();
                document.getElementById('formulario-laboratorio').reset();
            });
            
            //funcion para eliminar errores
            function clearErrors() {
                const errorMessages = document.querySelectorAll('.text-danger');
                errorMessages.forEach((msg) => {
                    msg.remove();
                });
            }
        });
    </script>
@endpush