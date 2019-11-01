<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Rotas Login
Route::get('/','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
// Rotas autenticadas
Route::group(['middleware' => ['auth']], function(){
    Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('funcionarios', 'FuncionariosController@index')->name('funcionarios');

});

