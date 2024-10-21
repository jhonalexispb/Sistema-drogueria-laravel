@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/dropzone/min/dropzone.min.css') }}">
@endsection
@section('content')
    <!-- Page Content -->
    <div class="block-content">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Editar Producto</h3>
            </div>
            {{-- @if ($errors->any())
                <div>
                    <h2>Errores:</h2>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-12">
                        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                {{-- <div class="mb-4 col-md-6 col-lg-4">
                                    <label class="form-label" for="codigo">Codigo <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="codigo" name="codigo" value="{{old('codigo')}}">
                                    @error('codigo')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div> --}}
                                {{-- <div class="mb-4 col-md-6 col-lg-4">
                                    <label class="form-label" for="tipo-producto">Tipo de producto <span class="text-danger">*</span></label>
                                    <select class="form-select" id="tipo-producto"
                                        name="tipo-producto" style="width: 100%;">
                                        <option value="" {{ old('tipo-producto') == '' ? 'selected' : '' }}>Escoge uno..</option>
                                        <option value="1" {{ old('tipo-producto') == '1' ? 'selected' : '' }}>Comercial</option>
                                        <option value="2" {{ old('tipo-producto') == '2' ? 'selected' : '' }}>Generico</option>
                                    </select>
                                    @error('tipo-producto')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> --}}
                                {{-- <div class="mb-4 col-md-6 col-lg-4">
                                    <label class="form-label" for="sale-boleta">Sale en boleta <span class="text-danger">*</span></label>
                                    <select class="form-select" id="sale-boleta"
                                        name="sale-boleta" style="width: 100%;" value="{{old('sale-boleta')}}">
                                        <option value="" {{ old('tipo-producto') == '' ? 'selected' : '' }}>Escoge uno..</option>
                                        <option value="1" {{ old('tipo-producto') == '1' ? 'selected' : '' }}>NO</option>
                                        <option value="2" {{ old('tipo-producto') == '2' ? 'selected' : '' }}>SI</option>
                                    </select>
                                    @error('sale-boleta')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> --}}
                                {{-- <div class="mb-4 col-md-6 col-lg-4">
                                    <!-- Select2 (.js-select2 class is initialized in Helpers.jqSelect2()) -->
                                    <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                                    <label class="form-label" for="laboratorio">Laboratorio <span class="text-danger">*</span></label>
                                    <select class="js-select2 form-select" id="laboratorio" name="laboratorio" style="width: 100%;" data-placeholder="Choose one.." value="{{old('laboratorio')}}">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <option value="html" {{ old('laboratorio') == 'html' ? 'selected' : '' }}>HTML</option>
                                        <option value="css" {{ old('laboratorio') == 'css' ? 'selected' : '' }}>CSS</option>
                                        <option value="javascript" {{ old('laboratorio') == 'javascript' ? 'selected' : '' }}>JavaScript</option>
                                        <option value="angular" {{ old('laboratorio') == 'angular' ? 'selected' : '' }}>Angular</option>
                                        <option value="react" {{ old('laboratorio') == 'react' ? 'selected' : '' }}>React</option>
                                        <option value="vuejs" {{ old('laboratorio') == 'vuejs' ? 'selected' : '' }}>Vue.js</option>
                                        <option value="ruby" {{ old('laboratorio') == 'ruby' ? 'selected' : '' }}>Ruby</option>
                                        <option value="php" {{ old('laboratorio') == 'php' ? 'selected' : '' }}>PHP</option>
                                        <option value="asp" {{ old('laboratorio') == 'asp' ? 'selected' : '' }}>ASP.NET</option>
                                        <option value="python" {{ old('laboratorio') == 'python' ? 'selected' : '' }}>Python</option>
                                        <option value="mysql" {{ old('laboratorio') == 'mysql' ? 'selected' : '' }}>MySQL</option>
                                    </select>
                                    @error('laboratorio')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> --}}

                                {{-- <div class="mb-4 col-md-6 col-lg-4">
                                    <label class="form-label" for="codigo-barra">Codigo de barra</label>
                                    <input type="text" class="form-control" id="codigo-barra" name="codigo-barra" value="{{old('codigo-barra')}}">
                                </div> --}}
                                <div class="mb-4 col-md-6 col-lg-4">
                                    <label class="form-label" for="nombre">Nombre <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre', $producto->nombre)}}">
                                    @error('nombre')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-4 col-md-6 col-lg-4">
                                    <label class="form-label" for="caracteristica">Caracteristicas <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="caracteristica" name="caracteristica" value="{{old('caracteristica', $producto->caracteristica)}}">
                                    @error('caracteristica')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-4 col-md-6 col-lg-4">
                                    <label class="form-label" for="registro_sanitario">Registro Sanitario</label>
                                    <input type="text" class="form-control" id="registro_sanitario" name="registro_sanitario" value="{{old('registro_sanitario', $producto->registro_sanitario)}}">
                                </div>
                                {{-- <div class="mb-4 col-md-6 col-lg-4">
                                    <label class="form-label" for="condicion-almacenamiento">Condicion de almacenamiento <span class="text-danger">*</span></label>
                                    <select class="js-select2 form-select" id="condicion-almacenamiento" name="condicion-almacenamiento[]" style="width: 100%;" data-placeholder="Escoge almenos uno.." multiple>
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <option value="no_mayor_30" {{ in_array('no_mayor_30', old('condicion-almacenamiento', [])) ? 'selected' : '' }}>No mayor de 30° C</option>
                                        <option value="no_exponer_luz" {{ in_array('no_exponer_luz', old('condicion-almacenamiento', [])) ? 'selected' : '' }}>No exponer a la luz</option>
                                        <option value="javascript" {{ in_array('javascript', old('condicion-almacenamiento', [])) ? 'selected' : '' }}>JavaScript</option>
                                        <option value="angular" {{ in_array('angular', old('condicion-almacenamiento', [])) ? 'selected' : '' }}>Angular</option>
                                        <option value="react" {{ in_array('react', old('condicion-almacenamiento', [])) ? 'selected' : '' }}>React</option>
                                        <option value="vuejs" {{ in_array('vuejs', old('condicion-almacenamiento', [])) ? 'selected' : '' }}>Vue.js</option>
                                        <option value="ruby" {{ in_array('ruby', old('condi8cion-almacenamiento', [])) ? 'selected' : '' }}>Ruby</option>
                                        <option value="php" {{ in_array('php', old('condicion-almacenamiento', [])) ? 'selected' : '' }}>PHP</option>
                                        <option value="asp" {{ in_array('asp', old('condicion-almacenamiento', [])) ? 'selected' : '' }}>ASP.NET</option>
                                        <option value="python" {{ in_array('python', old('condicion-almacenamiento', [])) ? 'selected' : '' }}>Python</option>
                                        <option value="mysql" {{ in_array('mysql', old('condicion-almacenamiento', [])) ? 'selected' : '' }}>MySQL</option>
                                    </select>
                                    @error('condicion-almacenamiento')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> --}}
                                <div class="mb-4">
                                    <label class="form-label" for="descripcion">Descripcion</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="4">{{old('descripcion', $producto->descripcion)}}</textarea>
                                </div>
                                {{-- <div class="mb-4 col-md-6 col-lg-4">
                                    <label class="form-label">¿Tiene principios activos?</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" value="1" id="tiene-principio-activo" name="tiene-principio-activo" {{ old('tiene-principio-activo') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tiene-principio-activo"></label>
                                    </div>
                                </div>
                                <div class="mb-4 col-md-6 col-lg-4">
                                    <label class="form-label">¿Tiene lotes?</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" value="1" id="tiene-lotes" name="tiene-lotes" {{ old('tiene-lotes') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tiene-lotes"></label>
                                    </div>
                                </div> --}}
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-alt-primary submit-button">Editar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Info -->
    </div>
    <!-- END Page Content -->
@endsection
@section('js')
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <script type="module">Dashmix.helpersOnLoad(['jq-select2']);</script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const submitButton = document.querySelector('.submit-button');
            submitButton.addEventListener('click', function(event) {
                this.disabled = true; // Deshabilitar el botón
                this.innerText = 'Editando...'; // Cambia el texto del botón
                const form = this.closest('form');
                if (form) {
                    form.submit(); // Envía el formulario
                }
            });
        });
    </script>
@endsection