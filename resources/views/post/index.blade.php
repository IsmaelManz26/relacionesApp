@extends('base')

@section('content')
    @foreach($posts as $post)
        <div class="post-preview">
            <a href="{{ url('post/' . $post->id) }}">
                <h2 class="post-title">
                    {{ $post->titulo }}
                </h2>
                <h3 class="post-subtitle">
                    {{ $post->entrada }}
                </h3>
            </a>
            <p class="post-meta">
                Publicado por
                <a href="#">izvserver</a>
                el {{ $post->created_at->locale('es')->isoFormat('dddd D \d\e MMMM \d\e\l Y') }}
            </p>
        </div>
        <hr class="my-4" />
    @endforeach
@endsection