@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
@stop

@section('content')
    @include('includes.alerts')
    <div class="row margin-bottom">
        <div class="col-xs-12">
            <div class="btn-group">
                <a href="{{ url('clientes/importar') }}" class="btn btn-primary">Importar clientes</a>
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
                            <th style="width: 10px">Matrícula</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Status</th>
                            <th>Cargo</th>
                            <th style="width: 100px; min-width:100px;">Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td style="text-align:center;">{{$client->id}}</td>
                                <td>{{$client->nome}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->status}}</td>
                                <td>{{$client->office}}</td>
                                <td>
                                    <a href="{{Route('funcionarios.editar', $client->id)}}"
                                       class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                            data-target="#modal" data-nome="{{$client->nome}}"
                                            data-identificador="{{$client->id}}"
                                            data-acao="Deseja excluir o Funcionário "><i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Modal Excluir --}}
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{Route('funcionarios.excluir')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="idFuncionario" class="identificador">
                                <div class="form-group">
                                    <h5 class="nome"></h5>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                            <button type="submit" class="btn btn-danger">Sim</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Modal Excluir --}}
        </div>
@stop