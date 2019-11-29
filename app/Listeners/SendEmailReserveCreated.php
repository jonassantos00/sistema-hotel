<?php

namespace App\Listeners;

use App\Events\ReservationCreated as ReservationCreatedEvent;
use App\Notifications\ReservationCreated as ReservationCreatedNotify;
use App\Models\Client;
use Illuminate\Support\Facades\Log;

class SendEmailReserveCreated
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}
	
	/**
	 * Handle the event.
	 *
	 * @param ReservationCreatedEvent $event
	 * @return void
	 */
	public function handle(ReservationCreatedEvent $event)
	{
		/** @var Client $client */
		$client = Client::find($event->reservation()->getAttribute('id_client'));
//		$client->notify(new ReservationCreatedNotify());
		
		Log::info($event->reservation());
	}
}
