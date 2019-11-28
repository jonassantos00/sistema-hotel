<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}
	
	public function rules()
	{
		return [
			'id_room' => ['required', 'exists:rooms,id'],
			'reservation_start_date' => ['required', 'date', 'date_format:d/m/Y'],
			'reservation_end_date' => ['required', 'date', 'date_format:d/m/Y', 'after_or_equal:reservation_start_date'],
			'client_name' => ['required', 'alpha'],
			'client_email' => [
				'required',
				'email',
				'confirmed',
				Rule::exists('clients', 'email')->where('status', 'ACTIVE'),
			],
		];
	}
}
