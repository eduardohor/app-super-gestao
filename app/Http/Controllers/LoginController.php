<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	public function index(Request $request)
	{
		$erro = '';

		if($request->erro == 1){
			$erro = 'Usuário e ou senha inválidos';
		}

		if($request->erro == 2){
			$erro = 'Necessário realizar login para ter acesso a página';
		}

		return view('site.login', ['title' => 'Login', 'erro' => $erro]);
	}

	public function autenticar(Request $request)
	{
		$regras = [
			'usuario' => 'email',
			'senha' => 'required'
		];

		$feedback = [
			'usuario.email' => 'O campo usuário (e-mail) deve ser um e-mail válido',
			'senha.required' => 'O campo senha é obrigatório'
		];

		$request->validate($regras, $feedback);

		$email = $request->usuario;
		$senha = $request->senha;

		$user = new User();

		$usuario = $user->where('email', $email)->where('password', $senha)->first();

		if (isset($usuario->name)) {
			session_start();
			$_SESSION['nome'] = $usuario->name;
			$_SESSION['email'] = $usuario->email;

			return redirect()->route('app.clientes');

		} else {
			return redirect()->route('site.login', ['erro' => 1]);
		}
	}
}
