<button class="btn btn-alt-secondary push mb-md-0" id="editar-lab" data-bfg="{{ $idLaboratorio }}" onclick="editLaboratorio(this.dataset.bfg)">
    <i class="fa fa-fw fa-pen-to-square">
    </i>
</button>
@push('js')
    @vite(['resources/js/bootstrap.js', 'resources/js/pages/lottie-lordicon.js'])
    <script type="module">
        import { handleError, tiempoEstandar } from "{{ asset('js/axios/axiosHelper.js')}}";
        
        window.editLaboratorio = function(id) {
            axios.get(`/laboratorios/${id}/edit`, tiempoEstandar)
            .then(response => {
                const laboratorio = response.data;
                document.getElementById('e_codigo').value = laboratorio.codigo;
                document.getElementById('e_nombre').value = laboratorio.nombre;
                document.getElementById('e_margen_minimo').value = laboratorio.margen_minimo;

                document.getElementById('registrar-edicion-lab').setAttribute('data-id', id);

                // Establecer la acción del formulario
                document.getElementById('formulario-edicion-laboratorio').action = `/laboratorios/${id}`;
                const modalElement = document.getElementById('modal-edicion-laboratorio');
                
                // Obtener la instancia existente del modal creado en el componente formulario-edicion-laboratorio
                const modaleditar = bootstrap.Modal.getInstance(modalElement);

                // Mostrar el modal con la información del laboratorio
                modaleditar.show();
            })
            .catch(error => {
                handleError(error); // Manejar el error
            });
        }
    </script>
@endpush