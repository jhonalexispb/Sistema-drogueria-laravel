@extends('layouts.backend')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('js/plugins/dropzone/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/selectize/css/selectize.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/selectize/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
    <x-productos.formulario-creacion-productos />
@endsection
@section('js')
    @vite(['resources/js/app.js', 'resources/js/bootstrap.js', 'resources/js/pages/lottie-lordicon.js', 'resources/js/pages/sweetAlert2.js'])
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script> --}}
    <script src="{{ asset('js/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/plugins/selectize/js/selectize.min.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection