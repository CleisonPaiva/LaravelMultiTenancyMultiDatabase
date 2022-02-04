@extends('adminlte::page')

@section('title', 'Companies Create')

@section('content_header')
    <h1>Companies Edit</h1>
@stop

@section('content')
    <a id="" href="{{ route('company.index') }}" class="btn btn-outline-dark mt-1">
        <i class="fas fa-arrow-left"></i> <span class="button-text">Voltar</span>
    </a>
    <button id="btn_delete" type="submit" form="form-delete-campo" class="btn btn-danger mt-1">
        <i class="fas fa-trash"></i> <span class="button-text">Excluir</span>
    </button>
    <button id="btn_submit" type="submit" form="form-update-company" class="btn btn-primary mt-1">
        <i class="fas fa-save"></i> <span class="button-text">Salvar</span>
    </button>

    <div class="card shadow">
        <div class="card-body">
            <form id="form-update-company" class="form-horizontal" method="POST" action="{{ route('company.update',$company->id) }}">
                @csrf
                @method('PUT')
                @include('company.fields')
            </form>

            <form id="form-delete-campo" method="POST" action="{{ route('company.destroy', $company->id) }}">
                @csrf
                @method('DELETE')
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

