@extends('base')

@section('content')
<form action="{{ route('comment.update', $comment->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" class="form-control" id="correo" name="correo" required>
    </div>
    <div class="mb-3">
        <label for="texto" class="form-label">Comentario</label>
        <textarea class="form-control" id="texto" required name="texto">{{ $comment->texto }}</textarea>
    </div>
    <hr>
    <div class="mb-3 float-end">
        <button type="submit" class="btn btn-secondary">Guardar cambios</button>
    </div>
</form>
@endsection