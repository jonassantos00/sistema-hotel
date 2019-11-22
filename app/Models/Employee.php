<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	// Offices
    public const MANAGER = 'MANAGER';
    public const EMPLOYEE = 'EMPLOYEE';

    // Status
    public const ACTIVE = 'ACTIVE';
    public const OFF = 'OFF';
    public const AWAY = 'AWAY';
}
