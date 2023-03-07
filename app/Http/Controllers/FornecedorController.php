<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

		public function listar ()
		{
			return view('app.fornecedor.listar');
		}

		public function adicionar (Request $request)
		{

			$msg = '';

			if ($request->_token) {
				$regras = [
					'nome' => 'required|min:3|max:40',
					'site' => 'required', 
					'uf' => 'required|min:2|max:2', 
					'email' => 'email', 
				];

				$feedback = [
					'required' => 'O campo :attribute deve ser preenchido',
					'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
					'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
					'uf.min' => 'O campo nome deve ter no mínimo 2 caracteres',
					'nome.max' => 'O campo nome deve ter no máximo 2 caracteres',
					'email' => 'O campo e-mail não foi preenchido corretamente'
				];

				$request->validate($regras, $feedback);

				$fornecedor = new Fornecedor();

				$fornecedor->create($request->all());

				$msg = 'Cadastro Realizado com sucesso!';

			}

			return view('app.fornecedor.adicionar', ['msg' => $msg]);
		}
}
