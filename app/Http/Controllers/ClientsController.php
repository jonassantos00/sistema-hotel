<?php

namespace App\Http\Controllers;

use App\Imports\ClientsImport;
use App\Models\Client;
use Illuminate\Http\Request;
use League\Flysystem\FilesystemNotFoundException;
use Maatwebsite\Excel\Exceptions\NoFilenameGivenException;
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
	 * Display the specified resource.
	 *
	 * @param \App\Models\Client $client
	 * @return \Illuminate\Http\Response
	 */
	public function show(Client $client)
	{
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Client $client
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Client $client)
	{
		//
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Client $client
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Client $client)
	{
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Client $client
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Client $client)
	{
		//
	}
}
