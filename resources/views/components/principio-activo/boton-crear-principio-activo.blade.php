@if ($texto)
    <button type="button" class="mb-2 text-white btn bg-gd-sea-op" id="crear-principio-activo">
        <i class="si si-plus"></i> Crear principio activo</button> 
@else
    <button type="button" class="px-2 py-1 mb-2 text-white btn bg-gd-sea-op" id="crear-principio-activo">
        <i class="si si-plus"></i></button> 
@endif

@push('js')
    <script>
        document.getElementById('crear-principio-activo').addEventListener('click', function() {
            const modalElement = document.getElementById('modal-principio-activo');
            // Obtener la instancia existente del modal creado en el componente formulario-edicion-linea-farmaceutica
            const modal = bootstrap.Modal.getInstance(modalElement);
            modal.show();
        });
    </script>
@endpush