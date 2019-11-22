<?php

namespace App\Imports;

use App\Models\Client;
use App\Notifications\FailedToImportClients;
use App\Notifications\ImportedClients;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\ImportFailed;

class ClientsImport implements ToCollection, WithValidation, WithEvents
{
	use Importable, RegistersEventListeners;
	
	/**
	 * @param Collection $rows
	 */
	public function collection(Collection $rows)
	{
		foreach ($rows as $row) {
			if (!isset($row[0])) {
				continue;
			}
			
			$client = Client::byIdExternal($row[0])->first() ?? new Client();
			$client->fill([
				'id_external' => $row[0],
				'name' => $row[1],
				'email' => $row[2],
				'phone' => $row[3],
				'address' => $row[4],
				'status' => $row[7]
			]);
			$client->save();
		}
	}
	
	public function rules(): array
	{
		return [
			'0' => Rule::unique('clients', 'id_external'),
			'5' => Rule::in(['ACTIVE', 'INACTIVE']),
		];
	}
	
	/**
	 * Dispara um evento após a importação para alertar os admins que a importação ocorreu com sucesso
	 * @param AfterImport $event
	 */
	public static function afterImport(AfterImport $event)
	{
		$admin = new User();
		$admin->setAttribute('email', 'administrador@sistema.hotel');
		$admin->notify(new ImportedClients());
	}
	
	/**
	 * Dispara evento caso ocorra algum erro na importação do arquivo, alertando todos os admins
	 * @param ImportFailed $event
	 */
	public static function importFailed(ImportFailed $event)
	{
		$admin = new User();
		$admin->setAttribute('email', 'administrador@sistema.hotel');
		$admin->notify(new FailedToImportClients($event));
	}
}
