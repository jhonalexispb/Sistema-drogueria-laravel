<button class="btn btn-alt-secondary push mb-md-0" id="editar-linea-farmaceutica" data-bfg="{{ $idLineaFarmaceutica }}" onclick="editLineaFarmaceutica(this.dataset.bfg)">
    <i class="fa fa-fw fa-pen-to-square">
    </i>
</button>
@push('js')
    @vite(['resources/js/bootstrap.js', 'resources/js/pages/lottie-lordicon.js'])
    <script type="module">
        import { handleError, tiempoEstandar } from "{{ asset('js/axios/axiosHelper.js')}}";
        window.editLineaFarmaceutica = function(id) {
            axios.get(`/lineasFarmaceuticas/${id}/edit`, tiempoEstandar)
            .then(response => {
                const lineaFarmaceutica = response.data;
                document.getElementById('e_nombre').value = lineaFarmaceutica.nombre;
                document.getElementById('registrar-edicion-linea-farmaceutica').setAttribute('data-id', id);
                // Establecer la acción del formulario
                document.getElementById('formulario-edicion-linea-farmaceutica').action = `/lineasFarmaceuticas/${id}`;
                const modalElement = document.getElementById('modal-edicion-linea-farmaceutica');
                
                // Obtener la instancia existente del modal creado en el componente formulario-edicion-linea-farmaceutica
                const modaleditar = bootstrap.Modal.getInstance(modalElement);

                // Mostrar el modal con la información de la linea farmaceutica
                modaleditar.show();
            })
            .catch(error => {
                handleError(error); // Manejar el error
            });
        }
    </script>
@endpush