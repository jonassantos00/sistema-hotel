<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	public $fillable = ['id_external', 'name', 'email', 'status', 'phone', 'address'];
}
