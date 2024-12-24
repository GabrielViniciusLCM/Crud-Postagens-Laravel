<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{

    public function home(){
        return view('home');
    }

    public function login(Request $request){
        $dados = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        if(auth()-> attempt(['name' => $dados['loginname'], 'password'=> $dados['loginpassword']])){
            $request-> session()-> regenerate();
        }

        return redirect('/');
    }
    public function cadastrar(Request $request){
        $dados = $request -> validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3', 'max:10']
        ]);

    
        $usuario = User::create($dados);
        auth() -> login($usuario);
        
        return redirect('/');
    }

    public function logout (){
        auth() -> logout();
        return redirect('/');
    }
}
