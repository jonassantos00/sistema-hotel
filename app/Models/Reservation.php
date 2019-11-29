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
	
	public function getDailyAttribute(): int
	{
		$start = Carbon::createFromFormat('Y-m-d', $this->getAttribute('reservation_start_date'));
		$end = Carbon::createFromFormat('Y-m-d', $this->getAttribute('reservation_end_date'));
		
		return $start->diffInDays($end) ?? 1;
	}
	
	public function room()
	{
		return $this->hasOne(Room::class, 'id', 'id_room');
	}
}
