<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {
        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário ou Senha inválidos';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Faça login antes de acessar essa página';
        }

        return view('site.login', ['title' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {

        //regras de autenticação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];
        // custumização das mensagens de validação
        $feedback = [
            'usuario.email' => 'O campo usurário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        // faz a validação dos campos do input login
        $request->validate($regras, $feedback);

        //recuperamos os valores do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
?>
