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
                    <h3 class="box-title">Realizar reserva</h3>
                </div>
                <form action="{{ route('reservations.book') }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <fieldset class="form-group">
                                    <label>
                                        Quarto
                                        @component('components.select', ['name' => 'id_room', 'isRequired' => true, 'options' => $rooms])
                                            <option>Selecione um quarto</option>
                                        @endcomponent
                                    </label>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <fieldset class="form-group">
                                    <label>
                                        Data de início
                                        <input type="text" class="form-control" name="reservation_start_date"
                                               placeholder="Data de inicio da reserva">
                                    </label>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <fieldset class="form-group">
                                    <label>
                                        Data de término
                                        <input type="text" class="form-control" name="reservation_end_date"
                                               placeholder="Data de término da reserva">
                                    </label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Reservar</button>
                    </div>
                </form>
            </div>
        </div>
@stop