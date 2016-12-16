<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index');
Route::get('/listaclientes', ['uses'=>'ClienteController@index','as'=>'clientes.index']);
Route::get('/listaclientesAdicionar', ['uses'=>'ClienteController@adicionar','as'=>'clientes.adicionar']);
Route::post('/salvar', ['uses'=>'ClienteController@salvar','as'=>'clientes.salvar']);
Route::get('/editar/{id}', ['uses'=>'ClienteController@editar','as'=>'clientes.editar']);
Route::put('/atualizar/{id}', ['uses'=>'ClienteController@atualizar','as'=>'clientes.atualizar']);
Route::get('/deletar/{id}', ['uses'=>'ClienteController@deletar','as'=>'clientes.deletar']);
Route::get('/detalhe/{id}', ['uses'=>'ClienteController@detalhe','as'=>'clientes.detalhe']);

Route::get('/telefoneAdicionar/{id}', ['uses'=>'TelefoneController@adicionar','as'=>'telefones.adicionar']);
Route::post('/telefoneSalvar/{id}', ['uses'=>'TelefoneController@salvar','as'=>'telefones.salvar']);
Route::get('/telefonedeletar/{id}', ['uses'=>'TelefoneController@deletar','as'=>'telefones.deletar']);
Route::get('/telefoneeditar/{id}', ['uses'=>'TelefoneController@editar','as'=>'telefones.editar']);
Route::put('/telefoneatualizar/{id}', ['uses'=>'TelefoneController@atualizar','as'=>'telefones.atualizar']);

