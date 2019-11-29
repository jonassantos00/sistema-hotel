<?php

namespace App\Events;

use App\Models\Reservation;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReservationCreated
{
	use Dispatchable, InteractsWithSockets, SerializesModels;
	
	public $reservation;
	
	public function __construct(Reservation $reservation)
	{
		$this->reservation = $reservation;
	}
	
	public function reservation(): Reservation
	{
		return $this->reservation;
	}
}
