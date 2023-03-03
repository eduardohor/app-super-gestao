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
		$regras = [
			'nome' => 'required|min:3|max:40',
			'telefone' => 'required',
			'email' => 'required|email|unique:site_contatos',
			'motivo_contatos_id' => 'required',
			'mensagem' => 'required|max:2000'
		];

		$feedback = [
			'nome.min' => 'O campo nome precisa ter no mínimo três caracteres',
			'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
			'email.unique' => 'O e-mail informado já está em uso',
			'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',

			'required' => 'O compo deve ser preenchido',
			'email' => 'O e-mail informado não é valido'
		];
		
		$request->validate($regras, $feedback);

		SiteContato::create($request->all());

		return redirect()->route('site.index');
	}
}
