@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')
    <a id="" href="/tenants/company/create" class="btn btn-primary mt-1">
        <i class="fas fa-plus-circle"></i> <span class="button-text">New Company</span>
    </a>
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

