@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
@stop

@section('content')
    @include('includes.alerts')
    <div class="row margin-bottom">
        <div class="col-xs-12">
            <div class="btn-group">
                <a href="{{ route('clients.import') }}" class="btn btn-primary">Importar clientes</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary table-responsive">
                <div class="box-header with-border">
                    <h3 class="box-title">Listagem de Clientes</h3>
                </div>
                <div class="">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th style="width: 20px">ID Externo</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>Status</th>
                            <th style="width: 100px; min-width:100px;">Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td style="text-align:center;">{{$client->id}}</td>
                                <td style="text-align:center;">{{$client->id_external}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->address}}</td>
                                <td>{{$client->status}}</td>
                                <td>
                                    <form action="{{ route('clients.destroy', ['id' => $client->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $client->id }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@stop