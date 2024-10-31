@if ($texto)
    <button type="button" class="mb-2 text-white btn bg-gd-sea-op" id="crear-linea-farmaceutica">
        <i class="si si-plus"></i> Crear linea farmaceutica</button> 
@else
    <button type="button" class="px-2 py-1 mb-2 text-white btn bg-gd-sea-op" id="crear-linea-farmaceutica">
        <i class="si si-plus"></i></button> 
@endif

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