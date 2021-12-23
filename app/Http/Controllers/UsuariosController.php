<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'asc')->get();

        return view('usuarios.index', ['usuarios' => $usuarios, 'pagina' => 'usuarios']);
    }

    public function create()
    {
        return view('usuarios.create', ['pagina' => 'usuarios']);
    }

    public function insert(Request $form)
    {
        $usuario = new Usuario();

        $usuario->name = $form->name;
        $usuario->email = $form->email;
        $usuario->username = $form->username;
        $usuario->password = Hash::make($form->password);

        $usuario->save();
        event(new Registered($usuario));
        return redirect()->route('verification.notice');
        return redirect()->route('usuarios.index');
    }

    // Ações de login
    public function login(Request $form)
    {
        // Está enviando o formulário
        if ($form->isMethod('POST')){
            // Se um dos campos não for preenchidos, nem tenta o login e volta
            // para a página anterior
            $credenciais = $form->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);
            // Tenta o login
            if (Auth::attempt($credenciais, $form->lembrar)){
                session()->regenerate();
                return redirect()->route('home');
            }else{
                // Login deu errado (usuário ou senha inválidos)
                return redirect()->route('login')->with('erro', 'Usuário ou senha inválidos.');
            }
        }
        return view('usuarios.login');
    }

    //validação de sessão de logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); /*vai validar a sessão*/
        $request->session()->regenerateToken(); /*vai gerar um novo token para quebrar a sessão que já tinha*/
        return redirect()->route('home');
    }

}
