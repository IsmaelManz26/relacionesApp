@extends('base')

@section('content')
{!! strip_tags($post->texto, env('PERMITTED_TAGS')) !!}

<hr>

@foreach($post->comments as $comment)

<div class="card">
    <div class="comment">
        <a href="{{ route('comment.edit', $comment->id) }}">{{ $comment->apodo }}</a>
        <p>{{ $comment->texto }}</p>
    </div>
    <div class="card-body">
        {{ $comment->texto }}
    </div>
    <div class="card-footer text-muted text-end">
        {{ $comment->apodo }}, {{ $comment->created_at->locale('es')->isoFormat('hh:mm dddd D \d\e MMMM \d\e\l Y') }}
        @if($comment->created_at->diffInMinutes(now()) < 10)
            <a href="{{ route('comment.edit', ['comment' => $comment->id]) }}" class="btn btn-sm btn-primary">Editar</a>
        @endif
    </div>
    
</div>
<hr>

@endforeach

<form action="{{ route('post.comment', ['post' => $post->id]) }}" method="post">
    @csrf
    <input type="hidden" id="post_id2" name="post_id" value="{{ $post->id }}">
    
    <div class="mb-3">
        <label for="correo2" class="form-label">Correo</label>
        <input type="email" class="form-control" id="correo2" name="correo" minlength="6"
                maxlength="100" required value="{{ old('correo') }}" placeholder="Introduce tu correo electrónico">
    </div>
    <div class="mb-3">
        <label for="apodo2" class="form-label">Apodo</label>
        <input type="text" class="form-control" id="apodo2" name="apodo" minlength="5"
                maxlength="40" required value="{{ old('apodo') }}" placeholder="Introduce el apodo">
    </div>
    <div class="mb-3">
        <label for="texto2" class="form-label">Comentario</label>
        <textarea class="form-control" id="texto2" name="texto" rows="3" required>{{ old('texto') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection

@section('titulo')
{{ $post->titulo }}
@endsection

@section('entrada')
{{ $post->entrada }}
@endsection

@section('by')
Publicado por
<a href="#">izvserver</a>
el {{ $post->created_at->locale('es')->isoFormat('dddd D \d\e MMMM \d\e\l Y') }}
@endsection