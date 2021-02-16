<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', "PessoaController@index");
Route::post('adicionarPessoas', "PessoaController@store");
Route::post('editarPessoa/{id}', "PessoaController@show");
Route::post('atualizarPessoa/{id}', "PessoaController@update");
Route::post('deletarPessoa/{id}', "PessoaController@destroy");

