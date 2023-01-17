@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form 
                class="mt-10 md:mt-0" 
                method="POST" 
                action="{{route('perfil.store')}}"
                enctype="multipart/form-data"
                >
                @csrf
                <div class="mb-5">
                    <label for="username"
                    class="mb-2 block uppercase text-gray-500 font-bold">
                    Username
                    </label>

                    <input
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu Nombre de usuario"
                        class="border p-3 w-full rounded-lg
                        @error('username')
                            border-red-500
                        @enderror"
                        value="{{ auth()->user()->username }}"
                    />

                    @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen"
                    class="mb-2 block uppercase text-gray-500 font-bold">
                    Imagen Perfil
                    </label>

                    <input
                        id="imagen"
                        name="imagen"
                        type="file"
                        class="border p-3 w-full rounded-lg"
                        value=""
                        accept=".jpg, .jpeg, .png"
                    />

                    @error('imagen')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password"
                    class="mb-2 block uppercase text-gray-500 font-bold">
                    Password
                    </label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Password Actual"
                        class="border p-3 w-full rounded-lg
                        @error('password')
                            border-red-500
                        @enderror"
                        value="{{old('password')}}"
                    />

                    @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">
                        {{ session('mensaje') }}
                    </p>
                    @endif

                    @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="new_password"
                    class="mb-2 block uppercase text-gray-500 font-bold">
                    New Password
                    </label>

                    <input
                        id="new_password"
                        name="new_password"
                        type="password"
                        placeholder="Nueva contraseña"
                        class="border p-3 w-full rounded-lg
                        @error('new_password')
                            border-red-500
                        @enderror"
                        value="{{old('new_password')}}"
                    />

                    @error('new_password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="new_password_confirmation"
                    class="mb-2 block uppercase text-gray-500 font-bold">
                    Repetir New Password 
                    </label>

                    <input
                        id="new_password_confirmation"
                        name="new_password_confirmation"
                        type="password"
                        placeholder="Repetir nueva contraseña"
                        class="border p-3 w-full rounded-lg
                        @error('new_password_confirmation')
                            border-red-500
                        @enderror"
                        value=""
                    />

                    @error('new_password_confirmation')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <input type="submit" 
                    value="Guardar Cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                    font-bold w-full p-3 text-white rounded-lg"
                />
                
            </form>
        </div>
    </div>
@endsection