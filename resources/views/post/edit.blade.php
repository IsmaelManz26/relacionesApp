@extends('base')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('post.update', $post->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required value="{{ $post->titulo }}">
    </div>
    <div class="mb-3">
        <label for="entrada" class="form-label">Entrada</label>
        <input type="text" class="form-control" id="entrada" name="entrada" required value="{{ $post->entrada }}">
    </div>
    <div class="mb-3">
        <label for="texto" class="form-label">Texto</label>
        <textarea class="form-control" id="texto" name="texto" rows="5" required>{{ $post->texto }}</textarea>
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ route('post.show', $post->id) }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@endsection