<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
	
	public function reserve() {
		$rooms = Room::all(['id', 'name', 'status'])->where('status', '=',Room::ACTIVE)->map(function(Room $room){
			return ['value' => $room->getAttribute('id'), 'display' => $room->getAttribute('name')];
		});
		return view('reservations.reserve')->with(compact('rooms'));
	}
	
	public function book() {
		return ;
	}
}
