@extends('adminlte::page')

@section('title', 'Quartos')

@section('content_header')

@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Cadastro de Quartos</h3>
              </div>
              <form action="{{Route('quartos.cadastar')}}" method="POST" >
                {{ csrf_field() }}
                <div class="box-body">
                  <div class="form-group col-md-2">
                    <label for="inputNumeroQuarto">Número</label>
                    <input type="number" class="form-control input-sm" name="numeroQuarto" value="{{old('numeroQuarto')}}" id="inputNumeroQuarto" required >
                  </div>
                <div class="form-group col-sm-2">
                    <label for="inputQtdCamas">Qtd. Cama</label>
                    <input type="number" class="form-control input-sm" name="qtdCamas" value="{{old('qtdCamas')}}" maxlength="2">
                </div>
                <div class="form-group col-md-2">
                    <label for="intupPreco">Preço</label>
                    <input type="text" name="preco" class="form-control input-sm" value="{{old('preco')}}">
                </div>
                  <div class="form-group col-md-4">
                    <label for="inputDescricao">Descrição</label>
                  <input type="text" class="form-control input-sm" name="descricao" value="{{old('descricao')}}" id="inputDescricao" required >
                  </div>
                    <div class="form-group col-md-2">
                        @include('includes.alerts')
                    </div>
                </div> 
                   
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
                </div>
              </form>
            </div>
  </div>
  <div class="col-md-12">
    <div class="box box-primary table-responsive">
      <div class="box-header with-border">
        <h3 class="box-title">Listagem de Quartos</h3>
      </div>
      <div class="">
        <table class="table">
          <thead>
            <tr>
              <th style="width: 10px">Número</th>
              <th>Descrição</th>
              <th>Camas</th>
              <th>Preço</th>
              <th>Status</th>
              <th style="width: 100px; min-width:100px;">Opções</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($quartos as $quarto)
            <tr>
                <td style="text-align:center;" >{{$quarto->numero_quarto}}</td>
                <td>{{$quarto->descricao}}</td>
                <td>{{$quarto->qtd_camas}}</td>
                <td>{{$quarto->preco}}</td>
                <td>{{$quarto->status}}</td>
                <td>
                  <a href="{{Route('quartos.editar', $quarto->id)}}" class="btn btn-info btn-xs"><i class="fa fa-edit" ></i></a>
                  <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal" data-nome="{{$quarto->descricao}}" data-identificador="{{$quarto->id}}" data-acao="Deseja excluir o quarto: " ><i class="fa fa-trash" ></i></button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
{{-- Modal Excluir --}}
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{Route('quartos.excluir')}}" method="POST" >
            {{ csrf_field() }}
            <input type="hidden" name="idQuarto" class="identificador" >
            <div class="form-group">
              <h5 class="nome">?</h5>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Não</button>
          <button type="submit" class="btn btn-danger btn-sm">Sim</button>
        </div>
      </form>
      </div>
    </div>
  </div>
{{-- Modal Excluir --}}
</div>
@stop
