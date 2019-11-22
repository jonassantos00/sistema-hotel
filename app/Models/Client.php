<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	public $fillable = ['id_external', 'name', 'email', 'status', 'phone', 'address'];
	
	public function scopeByIdExternal(Builder $query, int $idExternal)
	{
		return $query->where('id_external', $idExternal);
	}
}
