@extends('adminlte::page')

@section('title', 'Companies Create')

@section('content_header')
    <h1>Companies Create</h1>
@stop

@section('content')
    <button id="btn_submit" type="submit" form="form-new-company" class="btn btn-primary mt-1">
        <i class="fas fa-save"></i> <span class="button-text">Salvar</span>
    </button>

    <div class="card shadow">
        <div class="card-body">
            <form id="form-new-company" class="form-horizontal" method="POST" action="{{ route('company.index') }}">
                @csrf
                @include('company.fields')
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

