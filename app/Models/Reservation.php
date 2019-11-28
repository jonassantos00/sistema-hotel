<?php

namespace App\Models;

use App\Events\ReservationCreated;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
	protected $fillable = ['id_room'];
	
	protected $dispatchesEvents = [
		'created' => ReservationCreated::class
	];
	
	public function setReservationStartDateAttribute($value)
	{
		$this->attributes['reservation_start_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
	}
	
	public function setReservationEndDateAttribute($value)
	{
		$this->attributes['reservation_end_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
	}
}
