<button type="button" class="mb-2 text-white btn bg-gd-sea-op" id="crear-lab">
    <i class="si si-plus"></i> Crear laboratorio</button>
@push('js')

    @vite(['resources/js/bootstrap.js','resources/js/pages/lottie-lordicon.js'])
    <script type="module">
        import { handleError, tiempoEstandar } from "{{ asset('js/axios/axiosHelper.js')}}";

        document.getElementById('crear-lab').addEventListener('click', function() {
            const modalElement = document.getElementById('modal-laboratorio');
            const modal = bootstrap.Modal.getInstance(modalElement);
            const createButton = this; // Usar el botón que disparó el evento
            createButton.disabled = true;
            createButton.textContent = 'Generando formulario...';

            axios.get('/laboratorios/siguiente-codigo', tiempoEstandar)
            .then(response => {
                const data = response.data; // Manejar la respuesta
                document.getElementById('codigo').value = data.codigo;
                modal.show();
            })
            .catch(error => {
                handleError(error); // Manejar el error
            })
            .finally(() => {
                createButton.disabled = false;
                createButton.textContent = '';

                const icon = document.createElement('i');
                icon.className = 'si si-plus';
                createButton.appendChild(icon);
                createButton.append(' Crear laboratorio');
            });
        });
    </script>
@endpush