<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
            // realiza a validação dos dados enviados no request

        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required|min:11',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:500',
        ];

        $feedback = [
            'nome.min' => 'Preencha no mínimo 3 catacteres',
            'nome.max' => 'Preencha no máximo 40 catacteres',
            'nome.unique' => 'Este nome já existe',
            'telefone.min' => 'Preencha no mínimo 11 catacteres',
            'email.email' => 'Digite um endereço de email válido',
            'motivo_contatos_id.required' => 'O campo motivo contato precisa ser preechido',
            'mensagem.max' => 'Preencha no máximo 500 catacteres',

            'required' => 'O campo :attribute precisa ser preenchido'
        ];
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
