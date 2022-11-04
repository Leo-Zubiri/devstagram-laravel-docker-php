@extends('layouts.app')

@section('titulo')
    Tu cuenta
@endsection

@section('contenido')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex justify-center">
            <div class="md:w-4/12 lg:w-3/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="imagen usuario" />
            </div>
            <div class="md:w-4/12 lg:w-3/12 px-5">
                <p class="text-gray-700 text-3xl">{{auth()->user()->username }}</p>
            </div>
        </div>
    </div>
@endsection