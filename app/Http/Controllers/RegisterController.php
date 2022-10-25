<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //Por convencion se llama index al que retorna una vista
    public function index() {
        return view('auth.register');
    }
}
