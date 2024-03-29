<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Devstagram - @yield('titulo')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @stack('styles')
    @livewireStyles
</head>

<body class="antialiased">

    <header class="p-5 border-b bg-white shadow">
        <div class="conatainer mx-auto flex justify-between items-center">
            <a href="{{route('Home')}}" class="text-3xl font-black">Devstagram</a>

            @auth
            <nav class="flex gap-2 items-center">
                
                <a class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer"
                    href="{{ route('posts.create') }}"
                >
                    Crear
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </a>

                <a class="font-bold uppercase text-gray-600 text-sm mr-1" 
                   href="{{ route('posts.index',auth()->user()->username) }}">
                    Hola: 
                <span class="font-normal">{{auth()->user()->username}}</span>
                </a>

                <form method='POST' action="{{ route('logout') }}">
                @csrf 
                <button type="submit" class="font-bold uppercase text-gray-600">
                    Cerrar Sesión
                </button>
                </form>

            </nav>
            @endauth

            @guest
                <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600" href="{{route('login')}}">Login</a>
                    <a class="font-bold uppercase text-gray-600" href="{{route('register')}}">
                        Crear Cuenta
                    </a>
                </nav>
            @endguest

        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
        @yield('contenido')
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        Devstagram - Todos los derechos reservados {{ now()->year }}
    </footer>

    @livewireScripts
</body>

</html>
