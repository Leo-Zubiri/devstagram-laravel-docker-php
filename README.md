# Instalación

> Es recomendable utilizar docker para implementar y configurar el entorno de desarrollo para laravel

## Instalar y configurar docker

1. Descargar el instalador de la página oficial ![for developers](https://www.docker.com/get-started/)
2. Al terminar con la instalación reiniciar el equipo y aceptar los términos de docker.
3. Al aparecer el siguiente mensaje, evitar cerrarlo y abrir un powershell para ejecutar lo siguiente:
    ![](documentation/img/1.1.png)

    ```wsl --set-default-version 2```

    Para desplegar las distribuciones linux que se pueden instalar

    ```wsl --list --online```
    ![](documentation/img/1.2.png)


    Instalar con el siguiente comando, **sustituir por la distribución deseada**

    ```wsl --install -d <distribucion>```

4. Durante la instalacion se abrirá una ventana para colocar el usuario y contraseña del sistema linux.
![](documentation/img/1.3.png)

5. Una vez finalizado reiniciar la computadora.

---
## Primeros pasos

1. Abrir Powershell y ejecutar el comando ```wsl```
2. La subterminal que se abre es linux, se dirige a la ruta para empezar los proyectos. Por ejemplo, cd desktopp
3. Una vez en la ruta siempre que se desea crear un proyecto se coloca en la terminal:
   ```curl -s https://laravel.build/example-app | bash```

4. Durante la instalación se pide la contraseña linux para finalizar la creación del proyecto.

![](./documentation/img/2.1.png)

## Ejecutar el servicio de laravel
1. Desde wsl en powershell acceder a la ruta raiz del proyecto
2. Ejecutar ```./vendor/bin/sail up```
    > Lo anterior ejecuta todos los servicios de laravel en docker
3. Desde docker