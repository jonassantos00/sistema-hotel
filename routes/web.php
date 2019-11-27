<?php

use Illuminate\Support\Facades\Route;


// Rotas Login
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Rotas autenticadas
Route::group(['middleware' => ['auth']], function () {
	Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
	Route::prefix('funcionarios')->group(function () {
		Route::get('/', 'EmployeesController@index')->name('funcionarios');
		Route::post('cadastrar', 'EmployeesController@add')->name('funcionarios.cadastrar');
		Route::get('editar/{id}', 'EmployeesController@edit')->name('funcionarios.editar');
		Route::post('edit/{id}/update', 'EmployeesController@update')->name('funcionarios.atualizar');
		Route::post('excluir', 'EmployeesController@destroy')->name('funcionarios.excluir');
	});
	
	Route::prefix('clientes')->group(function () {
		Route::get('/', 'ClientsController@index')->name('clients');
		Route::get('importar', 'ClientsController@import')->name('clients.import');
		Route::delete('deletar/{id}', 'ClientsController@destroy')->name('clients.destroy');
	});
	
	Route::prefix('reservas')->group(function () {
		Route::get('reserva', 'ReservationsController@reserve')->name('reservations.reserve');
		Route::post('reservar', 'ReservationsController@book')->name('reservations.book');
	});
});