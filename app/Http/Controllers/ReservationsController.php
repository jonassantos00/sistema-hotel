<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Client;
use App\Models\Reservation;
use App\Models\Room;

class ReservationsController extends Controller
{
	
	public function reserve() {
		$rooms = Room::all(['id', 'name', 'status'])->where('status', '=',Room::ACTIVE)->map(function(Room $room){
			return ['value' => $room->getAttribute('id'), 'display' => $room->getAttribute('name')];
		});
		return view('reservations.reserve')->with(compact('rooms'));
	}
	
	public function book(BookRequest $request) {
		$request->validated();
		try {
			/** @var Client $client */
			$client = Client::all(['id', 'email'])->where('email', '=', $request->get('client_email'))->first();
			
			$reservation = new Reservation();
			$reservation->setAttribute('id_client', $client->getAttribute('id'));
			$reservation->setAttribute('reservation_start_date', $request->get('reservation_start_date'));
			$reservation->setAttribute('reservation_end_date', $request->get('reservation_end_date'));
			$reservation->setAttribute('id_room', $request->get('id_room'));
			$reservation->saveOrFail();
		} catch (\Exception $exception) {
			return redirect('reservas/reserva')->withErrors($exception->getMessage());
		}
	}
}
