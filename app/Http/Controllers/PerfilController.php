<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('perfil.index');
    }

    public function store(Request $request){
        // Modificar el request
        $request->request->add(['username'=>Str::slug($request->username)]);

        $this->validate($request,[
            'username' => [
                'required','min:3','max:20',
                'unique:users,username,'.auth()->user()->id,
                'not_in:twitter,editar-perfil'
            ]
        ]);
    }
}
