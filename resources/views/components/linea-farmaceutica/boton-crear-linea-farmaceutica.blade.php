<button type="button" class="mb-2 text-white btn bg-gd-sea-op" id="crear-linea-farmaceutica">
    <i class="si si-plus"></i> Crear linea farmaceutica</button>
@push('js')
    <script>
        document.getElementById('crear-linea-farmaceutica').addEventListener('click', function() {
            const modalElement = document.getElementById('modal-linea-farmaceutica');
            // Obtener la instancia existente del modal creado en el componente formulario-edicion-linea-farmaceutica
            const modal = bootstrap.Modal.getInstance(modalElement);
            modal.show();
        });
    </script>
@endpush