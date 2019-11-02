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
    Route::post('funcionarios/cadastrar', 'FuncionariosController@cadastrar')->name('funcionarios.cadastrar');
    Route::get('funcionarios/editar/{idFuncionario}', 'FuncionariosController@editar')->name('funcionarios.editar');
    Route::post('funcionarios/editar/{idFuncionario}/atualizar', 'FuncionariosController@atualizar')->name('funcionarios.atualizar');
    Route::post('funcionarios/excluir', 'FuncionariosController@excluir')->name('funcionarios.excluir');

});

