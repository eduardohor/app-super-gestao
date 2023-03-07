@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

<div class="conteudo-pagina">
	<div class="titulo-pagina2">
		<p>Fornecedor - Adicionar</p>
	</div>

	<div class="menu">
		<ul>
			<li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
			<li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
		</ul>
	</div>

	<div class="informacao-pagina">
		{{ $msg }}
		<div style="width: 30%; margin-left: auto; margin-right: auto;">
			<form action="{{ route('app.fornecedor.adicionar') }}" method="post">
				@csrf
				<input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ old('nome') }}">
				@error('nome')
						{{ $message }}
				@enderror
				<input type="text" name="site" placeholder="Site" class="borda-preta" value="{{ old('site') }}">
				@error('site')
						{{ $message }}
				@enderror
				<input type="text" name="uf" placeholder="UF" class="borda-preta" value="{{ old('uf') }}">
				@error('uf')
						{{ $message }}
				@enderror
				<input type="text" name="email" placeholder="E-mail" class="borda-preta" value="{{ old('email') }}">
				@error('email')
						{{ $message }}
				@enderror
				<button type="submit" class="borda-preta">Cadastrar</button>
			</form>
		</div>
	</div>
</div>
		
@endsection