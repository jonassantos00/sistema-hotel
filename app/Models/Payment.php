<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $fillable = ['id_reservation', 'paid_value', 'is_paid'];
}
