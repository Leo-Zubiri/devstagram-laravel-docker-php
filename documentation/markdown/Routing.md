# Routing
> Al acceder a una dirección web carga una vista, es decir la parte visual de la página correspondiente.

En la carpeta resources:

views. Creamos los archivos plantilla ahí.
routes. Archivos correspondientes al acceder a una determinada dirección para cargar la respectiva vista.

En **routes/web.php** para cargar una vista:
```php
Route::get('/ruta',function () { return view('pagina')});

// Hace referencia a pagina.blade.php
```
