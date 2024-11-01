<div class="mb-4 col-md-6 col-lg-4">
    <div class="d-flex justify-content-between align-items-center">
        <label class="form-label" for="principios_activos">Principios Activos <span class="text-danger">*</span></label>
        <x-principio-activo.boton-crear-principio-activo :texto="false"/>
    </div>
    <select class="form-control" id="principios_activos" name="principios_activos" style="width: 100%;" value="{{old('principios_activos')}}">
        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
        @foreach ($principiosActivos as $linea)
            <option {{ old('principios_activos') == $linea->id ? 'selected' : '' }} value="{{$linea->id}}">{{$linea->nombre}} {{$linea->concentracion}}</option>
        @endforeach
    </select>
    @error('linea_farmaceutica')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<script>
    const principioActivoSelect = document.getElementById('principios_activos');
        if (principioActivoSelect) {
            $(principioActivoSelect).selectize({
                placeholder: 'Escogess uno..',
                allowEmptyOption: true,
                maxItems: null,
                persist: false,
                render: {
                    item: function(item, escape) {
                        return `<div>${escape(item.text)} <button class="px-1 py-0 btn btn-outline-danger btn-sm ms-2 remove-item" type="button" onclick="removeItem('${escape(item.value)}')">&times;</button></div>`;
                    },
                    option: function(item, escape) {
                        return `<div class="px-2 py-2">${escape(item.text)}</div>`;
                    }
                }
            });
        }

        function removeItem(value) {
            const selectize = $('#principios_activos')[0].selectize;
            selectize.removeItem(value);
            selectize.refreshOptions(false);
        }
</script>