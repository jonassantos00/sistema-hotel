@extends('adminlte::page')

@section('title', 'Funcionários')

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
                <form action="{{Route('funcionarios.atualizar', $funcionario->id)}}" method="POST" >
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group col-md-4">
                      <label for="inputNome">Nome Completo</label>
                      <input type="text" class="form-control" name="nome" value="{{$funcionario->nome}}" id="inputNome" required >
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputDataNascimento">Data de Nascimento</label>
                    <input type="date" class="form-control" name="dataNascimento" value="{{$funcionario->data_nascimento}}" id="inputDataNascimento" required >
                    </div>
                    <div class="form-group col-md-3">
                            <label for="inputCpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" value="{{$funcionario->cpf}}" id="inputCpf" >
                    </div>
                    <div class="form-group col-md-3">
                        <label>Cargo</label>
                        <select name="cargo" class="form-control" required >
                          <option value="Gerente"  @if($funcionario->cargo == 'Gerente') selected @endif > Gerente </option>
                          <option value="Funcionário" @if($funcionario->cargo == 'Funcionário') selected @endif > Funcionário </option>
                        </select>
                    </div>
                    <div class="form-group col-md-3" >
                      <label for="inpuntEmail">E-mail</label>
                      <input type="email" name="email" value="{{$funcionario->email}}" class="form-control" id="inputEmail" required >
                    </div>      
                  <div class="form-group col-md-3">
                    <label>Status</label>
                    <select name="status" class="form-control" required >
                      <option value="Ativo" @if($funcionario->status == 'Ativo') selected @endif > Ativo</option>
                      <option value="Desligado" @if($funcionario->status == 'Desligado') selected @endif > Desligado</option>
                      <option value="Afastado" @if($funcionario->status == 'Afastado') selected @endif > Afastado</option>
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