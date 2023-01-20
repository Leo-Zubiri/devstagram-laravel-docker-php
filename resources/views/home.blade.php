@extends('layouts.app')

@section('titulo')
    Página principal
@endsection

@section('contenido')
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

    @forelse ($posts as $post)
        <div>
            <a href="{{route('posts.show',['post'=>$post, 'user'=>$post->user])}}"
            ><img src="{{ asset('uploads').'/'. $post->imagen }}" alt="Imagen Post {{ $post->titulo }}"></a>
        </div>
    @empty
        <p class="text-center">No hay posts</p>
    @endforelse

    </div>
    <div class="my-10">
        {{ $posts->links('pagination::tailwind') }}
    </div>
@endsection