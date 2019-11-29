@extends('adminlte::page')

@section('title', 'Reserva')

@section('content_header')
@stop

@section('content')
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Reseva #{{ $reservation->id }}</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <b>Data de entrada:</b> {{ $reservation->reservation_start_date }}
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <b>Data de saída:</b> {{ $reservation->reservation_end_date }}
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <b>Status da reserva:</b> {{ $reservation->getStatusLabel($reservation->status) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <b>Valor cobrado:</b> {{ money_format('%i', $reservation->payment->paid_value) }}
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <b>Status:</b> {{ $reservation->payment->is_paid ? 'PAGO' : 'NÃO PAGO' }}
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <b>Quarto:</b> {{ $reservation->room->name }} Nº {{ $reservation->room->number }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <b>ID Checkout:</b> {{ $reservation->payment->transaction_code }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop