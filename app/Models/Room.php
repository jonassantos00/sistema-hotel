<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	public const SIMPLE = 'SIMPLE';
	public const DOUBLE = 'DOUBLE';
	public const APARTMENT = 'APARTMENT';
	public const SUITE = 'SUITE';
	
	public const ACTIVE = 'ACTIVE';
	public const INACTIVE = 'INACTIVE';
	public const RESERVED = 'RESERVED';
	
	protected $fillable = ['name', 'type', 'status', 'daily_value', 'number'];
}
