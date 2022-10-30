# **Migraciones**

> Las migraciones establecen la estructura de las tablas en la bdd.

**Iniciar las migraciones**```php artisan migrate```

**Iniciar migración con nombre:** ```php artisan make:migration agregar_imagen_user```

**Retornar a la migración anterior:** ```php artisan migrate:rollback```

**Retornar varias migraciones atrás:** ```php artisan migrate:rollback --step=5```



