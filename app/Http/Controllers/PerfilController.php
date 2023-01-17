<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

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
            ],
            'password' => [
                $request->password ? 'min:6' : ''
            ],
            
            'new_password' => 
                $request->password ? 'min:6|required|confirmed' : ''
            ,
        ]);

        if( $request->password && !auth()->attempt([
            'email' => auth()->user()->email,
            'password' => $request->password
        ])){
            return back()->with('mensaje','Contraseña incorrecta');
        } 

        if($request->imagen){
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid().".".$imagen->extension();

            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);
            $imagenPath = public_path("perfiles").'/'.$nombreImagen;
            $imagenServidor->save($imagenPath);
        } 

        //Guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';
        $usuario->password = $request->password ? Hash::make( $request->new_password ) : auth()->user()->password;

        $usuario->save();

        // redireccionar
        return redirect()->route('posts.index',$usuario->username);
    }
}
