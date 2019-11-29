<?php


namespace App\Http\Controllers;


use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Support\Facades\Log;
use laravel\pagseguro\Item\Item;
use laravel\pagseguro\Transaction\Information\Information;
use laravel\pagseguro\Transaction\Status\Status;

class PaymentController
{
	public static function Notification(Information $information)
	{
		/** @var Status $status */
		$status = $information->getStatus();
		
		/** @var Item $item */
		$item = $information->getItems()->offsetGet(0);
		
		if ($status->getCode()  == 3) {
			/** @var Reservation $reservation */
			$reservation = Reservation::findOrFail($item->getId());
			$reservation->setAttribute('status', Reservation::RESERVED);
			$reservation->save();
			
			/** @var Payment $payment */
			$payment = $reservation->payment;
			$payment->setAttribute('is_paid', true);
			$payment->save();
		} elseif ($status->canceled()) {
			/** @var Reservation $reservation */
			$reservation = Reservation::findOrFail($item->getId());
			$reservation->setAttribute('status', Reservation::CANCELED);
			$reservation->save();
			
			/** @var Payment $payment */
			$payment = $reservation->payment;
			$payment->setAttribute('is_paid', false);
			$payment->save();
		}
		
		Log::debug(print_r($status, 1));
		Log::debug(print_r($information, 1));
	}
}