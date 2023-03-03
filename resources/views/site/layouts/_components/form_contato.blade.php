{{ $slot }}
<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input name="nome" type="text" placeholder="Nome" class="{{ $classe }}" value="{{ old('nome') }}">
		@error('nome')
				{{ $message }}
		@enderror
    <br>
    <input name="telefone"type="text" placeholder="Telefone" class="{{ $classe }}" value="{{ old('telefone') }}">
		@error('telefone')
				{{ $message }}
		@enderror
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $classe }}" value="{{ old('email') }}">
		@error('email')
				{{ $message }}
		@enderror
    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
				@foreach ($motivo_contatos as $key => $motivo_contato)
        <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') ==$motivo_contato->id ? 'selected': '' }}>{{ $motivo_contato->motivo_contato }}</option>	
				@endforeach
    </select>
		@error('motivo_contatos_id')
				{{ $message }}
		@enderror
    <br>
    <textarea name="mensagem" class="{{ $classe }}">{{ (old('mensagem') != '') ? old('mensagem'): 'Preencha aqui a sua mensagem'}}
		</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

