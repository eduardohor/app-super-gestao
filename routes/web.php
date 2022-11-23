<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return 'Olá, seja bem vindo!';
});

Route::get('/sobre-nos', 'SobreNosController@sobreNos');

Route::get('/contato', 'ContatoController@contatos');
