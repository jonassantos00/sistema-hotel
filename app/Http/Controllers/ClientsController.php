<?php

namespace App\Http\Controllers;

use App\Imports\ClientsImport;
use App\Models\Client;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClientsController extends Controller
{
	public function index()
	{
		$clients = Client::orderBy('id', 'desc')->get();
		return view('clients.index', compact('clients'));
	}
	
	/**
	 * Importa os clientes do arquivo CSV para o sistema
	 */
	public function import()
	{
		try {
			Excel::import(new ClientsImport(), 'clients.csv', 'local');
			return redirect('clientes')->with('success', 'Clientes importados com sucesso!');
		} catch (\Exception $exception) {
			return redirect('clientes')->withErrors("Erro ao importar clientes: {$exception->getMessage()}");
		}
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Client $client
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request)
	{
		try {
			$client = Client::findOrFail(intval($request->get('id')));
			$client->delete();
			return redirect()->back()->with('success', 'Cliente deletado com sucesso!');
		} catch (\Exception $exception) {
			return redirect()->back()->withErrors("Erro ao tentar excluir um cliente: {$exception->getMessage()}");
		}
	}
}
