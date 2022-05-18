@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuarios con experiencia en: {{ $tecnologia->name }}</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <input class="form-control" placeholder="Ingrese el nombre de la tecnología o habilidad">
        </div>
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="display:none">Id</th>
                        <th>Nombre y apellidos</th>
                        <th>Experiencia</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tecnologia->candidates as $candidato)
                        <tr>
                            <td style="display:none">Id</td>
                            <td>{{ $candidato->name }} {{$candidato->apellidos}}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
