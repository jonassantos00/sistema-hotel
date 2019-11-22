@extends('adminlte::page')

@section('title', 'Editar Quarto')

@section('content_header')

@stop

@section('content')
<div class="row">
    
        <div class="col-md-12">
                <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Editar Quarto</h3>
                      </div>
                      <form action="{{Route('quartos.atualizar', $quarto->id)}}" method="POST" >
                        {{ csrf_field() }}
                        <div class="box-body">
                          <div class="form-group col-md-2">
                            <label for="inputNumeroQuarto">Número</label>
                            <input type="number" class="form-control input-sm" name="numeroQuarto" disabled value="{{$quarto->numero_quarto}}" id="inputNumeroQuarto" required >
                          </div>
                        <div class="form-group col-sm-2">
                            <label for="inputQtdCamas">Qtd. Cama</label>
                            <input type="number" class="form-control input-sm" name="qtdCamas" value="{{$quarto->qtd_camas}}" maxlength="2">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="intupPreco">Preço</label>
                            <input type="text" name="preco" class="form-control input-sm" value="{{$quarto->preco}}">
                        </div>
                          <div class="form-group col-md-4">
                            <label for="inputDescricao">Descrição</label>
                          <input type="text" class="form-control input-sm" name="descricao" value="{{$quarto->descricao}}" id="inputDescricao" required >
                          </div>
                            <div class="form-group col-md-2">
                                @include('includes.alerts')
                            </div>
                        </div> 
                           
                        <div class="box-footer">
                            <a href="{{Route('quartos')}}" class="btn btn-default btn-sm">Voltar</a>
                            <button type="submit" class="btn btn-primary btn-sm">Atualizar</button>
                        </div>
                      </form>
                    </div>
          </div>




</div>    



@stop
