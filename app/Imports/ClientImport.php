<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class ClientImport implements ToArray
{
	use Importable;

    /**
    * @param array $row
    *
    * @return Client
    */
    public function model(array $row)
    {
    	dd($row);
    	exit;
        return new Client([
            'name' => $row[0],
            'phone' => $row[1],
            'address' => $row[2],
            'active' => $row[3],
        ]);
    }
	/**
	 * @param  array  $array
	 */
	public function array(array $array)
	{
		dd($array);
		exit;
	}
}
