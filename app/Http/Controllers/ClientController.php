<?php

	namespace App\Http\Controllers;

	use App\Imports\ClientImport;
	use Maatwebsite\Excel\Facades\Excel;

	class ClientController extends Controller
	{
		public function index()
		{
			return view('client/index');
		}

		public function import()
		{
			try {
				$array = Excel::toArray(new ClientImport(), 'clients.csv', 'local', \Maatwebsite\Excel\Excel::CSV);
				dd($array);
				exit;
			} catch (\Exception $exception) {
				dd($exception->getMessage());
				exit;
				return redirect('/')->withErrors($exception->getMessage());
			}
			return redirect('/')->with('success', trans('import.success'));
		}
	}
