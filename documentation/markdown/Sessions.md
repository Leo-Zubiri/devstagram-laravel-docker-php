## Sessions

### Iniciar Sesión

Para iniciar sesión por convención se utiliza un formulario para el login

```html
<form method='POST' action="{{route('login')}}" novalidate>
```

La ruta a la que apunta:
```Route::post('/login',[LoginController::class,'store']);```


El método store que confirma las credenciales:

```php
    $this->validate($request,[
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if(!auth()->attempt($request->only('email','password'))){
        return back()->with('mensaje','Credenciales incorrectas');
    }

    return redirect()->route('posts.index');
```

El retorno de error de credenciales se captura desde el formulario:

```php
@if (session('mensaje'))
    <p> {{ session('mensaje') }} </p>
@endif
```