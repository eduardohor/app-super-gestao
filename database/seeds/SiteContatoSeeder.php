<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contato = new SiteContato();
				$contato->nome = 'Sitema SG';
				$contato->telefone = '99 91232211';
				$contato->email = 'contato@sg.com.br';
				$contato->motivo_contato = '1';
				$contato->mensagem = 'Seja bem-vindo ao sistema Super Gestão';
				$contato->save();

    }
}
