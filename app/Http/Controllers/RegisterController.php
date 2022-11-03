<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //Por convencion se llama index al que retorna una vista
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request){
        //dd($request->get('username'));

        // Modificar Request
        $request->request->add(['username'=>Str::slug($request->username)]);

        // Validacion
        $this->validate($request,[
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $request->name, 
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make( $request->password )
        ]);

        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        auth()->attempt($request->only('email','password'));

        return redirect()->route('posts.index');
    }
}
