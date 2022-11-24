<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contatos')->name('site.contato');
Route::get('/login', function(){return 'Login';})->name('site.login');

Route::prefix('/app')->group(function(){
  Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
  Route::get('/fornecedores', function(){return 'Fornecedores';})->name('app.fornecedores');
  Route::get('/produtos', function(){return 'Podutos';})->name('app.produtos');

});

Route::fallback(function(){
  echo 'A rota acessada não existe, <a href="'.route('site.index').'"> clique aqui </a>para ir para página inicial';
});

