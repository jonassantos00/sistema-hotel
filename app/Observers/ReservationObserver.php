<?php

namespace App\Observers;

use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\Log;
use laravel\pagseguro\Checkout\Information\Information;
use laravel\pagseguro\Platform\Laravel5\PagSeguro;
use laravel\pagseguro\Remote\Checkout;
use mysql_xdevapi\Exception;

class ReservationObserver
{
	/**
	 * Handle the models reservation "created" event.
	 *
	 * @param \App\Models\Reservation $reservation
	 * @return void
	 * @throws \Throwable
	 */
	public function created(Reservation $reservation)
	{
		/** @var Room $room */
		$room = $reservation->room;
		
		/** @var Checkout $checkout */
		$checkout = PagSeguro::checkout()->createFromArray([
			'items' => [
				[
					'id' => $reservation->getAttribute('id'),
					'description' => "Reserva do período {$reservation->getAttribute('reservation_start_date')} à {$reservation->getAttribute('reservation_end_date')}",
					'quantity' => '1',
					'amount' => ($room->daily_value * $reservation->daily),
				],
			],
			'redirectURL' => route('reservations.status', [$reservation]),
			'notificationURL' => route('pagseguro.notification')
		]);
		$credentials = PagSeguro::credentials()->get();
		/** @var Information $information */
		$information = $checkout->send($credentials); // Retorna um objeto de laravel\pagseguro\Checkout\Information\Information
		
		if ($information) {
			$payment = new Payment([
				'id_reservation' => $reservation->getAttribute('id'),
				'paid_value' => ($room->daily_value * $reservation->daily),
				'transaction_code' => $information->getCode()
			]);
			$payment->saveOrFail();
		}
		
		Log::info($reservation->toJson());
		Log::info($payment->toJson());
		Log::info($information->getCode());
	}
}
