@extends('adminlte::page')

@section('title', 'Funcionários')

@section('content_header')
@stop

@section('content')
{{-- @include('includes.alerts') --}}
<div class="row">

    <div class="col-md-10">
          <!-- general form elements -->
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Cadastro de Funcionários</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <div class="form-group col-md-4">
                      <label for="exampleInputNome">Nome Completo</label>
                      <input type="text" class="form-control" id="exampleInputNome" >
                    </div>
                    <div class="form-group col-md-2">
                      <label for="exampleInputDataNascimento">Data de Nascimento</label>
                      <input type="date" class="form-control" id="exampleInputDataNascimento" >
                    </div>
                    <div class="form-group col-md-3">
                            <label for="exampleInputDataNascimento">CPF</label>
                            <input type="text" class="form-control" id="exampleInputDataNascimento" >
                    </div>
                    
                  </div>
                  <!-- /.box-body -->
    
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                  </div>
                </form>
              </div>
    </div>





</div>
@stop