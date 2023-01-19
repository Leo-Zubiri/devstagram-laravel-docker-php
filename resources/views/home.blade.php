@extends('layouts.app')

@section('titulo')
    Página principal
@endsection

@section('contenido')
    @forelse ($posts as $post)
        <h1> {{ $post->titulo }} </h1>
    @empty
        <p>No hay posts</p>
    @endforelse
@endsection