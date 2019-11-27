@extends('adminlte::page')

@section('title', 'Reserva')

@section('content_header')
@stop

@section('content')
    @include('includes.alerts')
    <div class="row">

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cadastro de Funcionários</h3>
                </div>
                <form action="{{ route('reservas.reservar')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group col-md-4">
                            <label for="inputNome">Nome Completo</label>
                            <input type="text" class="form-control" name="nome" value="{{old('nome')}}" id="inputNome"
                                   required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputDataNascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" name="dataNascimento"
                                   value="{{old('dataNascimento')}}" id="inputDataNascimento" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" value="{{old('cpf')}}" maxlength="11"
                                   id="inputCpf">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Cargo</label>
                            <select name="cargo" class="form-control" required>
                                <option value=""> Selecione uma opção</option>
                                <option value="Gerente"> Gerente</option>
                                <option value="Funcionário"> Funcionário</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inpuntEmail">E-mail</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control"
                                   id="inputEmail" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputPassword">Senha</label>
                            <input type="password" name="senha" class="form-control" id="inputPassword" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword2">Confirmar Senha</label>
                            <input type="password" name="confirmarSenha" class="form-control" id="inputPassword2"
                                   required>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value=""> Selecione uma opção</option>
                                <option value="Ativo"> Ativo</option>
                                <option value="Desligado"> Desligado</option>
                                <option value="Afastado"> Afastado</option>

                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
@stop