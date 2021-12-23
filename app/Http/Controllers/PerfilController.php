<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function profile()
    {
        return view('perfil.profile', ['pagina' => 'profile']);
    }
    public function update(Request $form)
    {
        $usuario = Auth::user();

        $usuario->name = $form->name;
        $usuario->email = $form->email;
        $usuario->username = $form->username;

        $usuario->save();
        return redirect()->route('profile');
    }
    public function senhaUpdate(Request $form)
    {
        if(Hash::check($form->atual, Auth::user()->password) && $form->password == $form->password_confirmation){
            $usuario = Auth::user();
            $usuario->password = Hash::make($form->password);
            $usuario->save();
            return redirect()->route('profile');
        }
    }
}
