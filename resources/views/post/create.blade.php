@extends('base')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
<script>
    $('#texto').summernote({
        placeholder: 'Aquí va tu artículo.',
        tabsize: 2,
        height: 120,
        toolbar: [
            //['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            //['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            //['table', ['table']],
            //['insert', ['link', 'picture', 'video']],
            //['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
@endsection

@section('content')

<form action="{{ route('post.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" minlength="25" 
                maxlength="60" required value="{{ old('titulo') }}" placeholder="Introduce el título del artículo">
    </div>
    <div class="mb-3">
        <label for="entrada" class="form-label">Entrada</label>
        <input type="text" class="form-control" id="entrada" name="entrada" minlength="60"
                maxlength="250" required value="{{ old('entrada') }}" placeholder="Introduce la entrada del artículo">
    </div>

    <div class="mb-3">
        <label for="texto" class="form-label">Texto</label>
        <textarea class="form-control" id="texto" required minlength="100" name="texto" placeholder="Introduce el artículo">{{ old('texto') }}</textarea>
    </div>
    <hr>
    <div class="mb-3 float-end">
        <button type="submit" class="btn btn-secondary">Agregar</button>
    </div>
</form>

@endsection