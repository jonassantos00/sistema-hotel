<?php

namespace App\Imports;

use App\Models\Client;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class ClientsImport implements ToModel, WithValidation
{
	use Importable;
	
	/**
	 * @param array $row
	 *
	 * @return Client|null
	 */
	public function model(array $row)
	{
		if (!isset($row[0])) {
			return null;
		}
		
		return new Client([
			'id_external' => $row[0],
			'name' => $row[1],
			'email' => $row[2],
			'phone' => $row[3],
			'address' => $row[4],
			'status' => $row[5]
		]);
	}
	
	public function rules(): array
	{
		return [
			'0' => Rule::unique('clients', 'id_external'),
			'5' => Rule::in(['ACTIVE', 'INACTIVE']),
		];
	}
	
	
}
