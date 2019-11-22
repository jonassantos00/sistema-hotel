@extends('adminlte::page')

@section('title', 'Funcionários | Alteração de dados')

@section('content_header')
@stop

@section('content')
    @include('includes.alerts')
    <div class="row">

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Funcionário</h3>
                </div>
                <form action="{{Route('funcionarios.atualizar', $employee->id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group col-md-4">
                            <label for="inputNome">Nome Completo</label>
                            <input type="text" class="form-control" name="nome" value="{{$employee->name}}"
                                   id="inputNome" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputDataNascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" name="dataNascimento"
                                   value="{{$employee->dt_birth}}" id="inputDataNascimento" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" value="{{$employee->cpf}}" id="inputCpf">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Cargo</label>
                            <select name="cargo" class="form-control" required>
                                <option value="MANAGER" @if($employee->office === 'MANAGER') selected @endif > Gerente
                                </option>
                                <option value="EMPLOYEE" @if($employee->office === 'EMPLOYEE') selected @endif >
                                    Funcionário
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inpuntEmail">E-mail</label>
                            <input type="email" name="email" value="{{$employee->email}}" class="form-control"
                                   id="inputEmail" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="ACTIVE" @if($employee->status === 'ACTIVE') selected @endif > Ativo
                                </option>
                                <option value="OFF" @if($employee->status === 'OFF') selected @endif > Desligado
                                </option>
                                <option value="AWAY" @if($employee->status === 'AWAY') selected @endif > Afastado
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{Route('funcionarios')}}" class="btn btn-default btn-sm">Voltar</a>
                        <button type="submit" class="btn btn-success btn-sm">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop