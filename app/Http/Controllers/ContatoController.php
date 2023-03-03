<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
	public function contatos()
	{
		$motivo_contatos = MotivoContato::all();

		return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
	}

	public function salvar(Request $request)
	{
		$request->validate([
			'nome' => 'required|min:3|max:40',
			'telefone' => 'required',
			'email' => 'required',
			'motivo_contato' => 'required',
			'mensagem' => 'required|max:2000'
		]);

		SiteContato::create($request->all());
	}
}
