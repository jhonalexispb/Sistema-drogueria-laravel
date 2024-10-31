<button class="btn btn-alt-secondary push mb-md-0" id="editar-linea-farmaceutica" data-bfg="{{ $idPrincipioActivo }}" onclick="editPrincipioActivo(this.dataset.bfg)">
    <i class="fa fa-fw fa-pen-to-square">
    </i>
</button>
@push('js')
    <script type="module">
        import { handleError, tiempoEstandar } from "{{ asset('js/axios/axiosHelper.js')}}";
        window.editPrincipioActivo = function(id) {
            axios.get(`/principiosActivos/${id}/edit`, tiempoEstandar)
            .then(response => {
                const principioActivo = response.data;
                document.getElementById('e_nombre').value = principioActivo.nombre;
                document.getElementById('registrar-edicion-principio-activo').setAttribute('data-id', id);
                // Establecer la acción del formulario
                document.getElementById('formulario-edicion-principio-activo').action = `/principiosActivos/${id}`;
                const modalElement = document.getElementById('modal-edicion-principio-activo');
                
                // Obtener la instancia existente del modal creado en el componente formulario-edicion-principio-activo
                const modaleditar = bootstrap.Modal.getInstance(modalElement);
                
                // Mostrar el modal con la información del principio activo
                modaleditar.show();
            })
            .catch(error => {
                handleError(error); // Manejar el error
            });
        }
    </script>
@endpush