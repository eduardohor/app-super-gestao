<?php

namespace App\Http\Middleware;

use App\LogAcesso;
use Closure;
use Facade\FlareClient\Http\Response;

class LogAcessoMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$ip = $request->server->get('REMOTE_ADDR');
		$rota = $request->getRequestUri();

		LogAcesso::create(['log' => "Ip $ip requisitou a rota $rota"]);
		
		$resposta = $next($request);
		
		$resposta->setStatusCode(201, 'O status da resposta e o texto da resposta foram modificados!!!');

		return $resposta;
	}
}
