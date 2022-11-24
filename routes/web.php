<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PrincipalController@principal');

Route::get('/sobre-nos', 'SobreNosController@sobreNos');

Route::get('/contato', 'ContatoController@contatos');

Route::get('/login', function(){return 'Login';});
Route::get('/clientes', function(){return 'Clientes';});
Route::get('/fornecedores', function(){return 'Fornecedores';});
Route::get('/produtos', function(){return 'Podutos';});

