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
                <form action="{{ action('ReservationsController@book') }}" method="POST">
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
                                        Data de entrada
                                        <input type="text" class="form-control" name="reservation_start_date"
                                               placeholder="Data de inicio da reserva">
                                    </label>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <fieldset class="form-group">
                                    <label>
                                        Data de saída
                                        <input type="text" class="form-control" name="reservation_end_date"
                                               placeholder="Data de término da reserva">
                                    </label>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <fieldset class="form-group">
                                    <label>
                                        Nome
                                        <input type="text" class="form-control" name="client_name" required>
                                    </label>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <fieldset class="form-group">
                                    <label>
                                        E-mail
                                        <input type="email" class="form-control" name="client_email"  required>
                                        <small class="help-block">A confirmação será enviada para este e-mail</small>
                                    </label>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <fieldset class="form-group">
                                    <label>
                                        Confirmar endereço de e-mail
                                        <input type="email" class="form-control" name="client_email_confirmation" required>
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