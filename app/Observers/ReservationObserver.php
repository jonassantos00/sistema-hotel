<?php

namespace App\Observers;

use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\Log;

class ReservationObserver
{
	/**
	 * Handle the models reservation "created" event.
	 *
	 * @param \App\Models\Reservation $reservation
	 * @return void
	 */
	public function created(Reservation $reservation)
	{
		try {
			/** @var Room $room */
			$room = $reservation->room;
			$payment = new Payment([
				'id_reservation' => $reservation->getAttribute('id'),
				'paid_value' => ($room->daily_value * $reservation->daily)
			]);
			$payment->saveOrFail();
			
			Log::info($reservation->toJson());
			Log::info($payment->toJson());
		} catch (\Exception $exception) {
			Log::error($exception->getMessage());
		}
	}
}
