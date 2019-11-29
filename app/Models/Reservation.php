<?php

namespace App\Models;

use App\Events\ReservationCreated;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
	public const AWAITING_PAYMENT = 'AWAITING_PAYMENT';
	public const RESERVED = 'RESERVED';
	public const CANCELED = 'CANCELED';
	public const EXPIRED = 'EXPIRED';
	
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
	
	public function getStatusLabel(string $internalName): string
	{
		if ($internalName === Reservation::RESERVED) {
			return 'Reservado';
		} elseif ($internalName === Reservation::CANCELED) {
			return 'Cancelado';
		} elseif ($internalName === Reservation::AWAITING_PAYMENT) {
			return 'Aguardando pagamento';
		} elseif ($internalName === Reservation::EXPIRED) {
			return 'Expirado';
		}
	}
	
	public function room()
	{
		return $this->hasOne(Room::class, 'id', 'id_room');
	}
	
	public function payment()
	{
		return $this->hasOne(Payment::class, 'id_reservation', 'id');
	}
}
