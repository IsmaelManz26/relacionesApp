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

    <!-- Pager -->
    {{-- {{ $posts->onEachSide(2)->links() }} --}}


    <nav>
        <ul class="pagination">
            {{-- Botón "Primera página" --}}
            <li class="page-item {{ $posts->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $posts->url(1) }}" aria-label="Primera página">&lsaquo;&lsaquo;</a>
            </li>
    
            {{-- Botón "Anterior" --}}
            <li class="page-item {{ $posts->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $posts->previousPageUrl() }}" aria-label="Anterior">&lsaquo;</a>
            </li>
    
            {{-- Páginas anteriores --}}
            @if($posts->currentPage() > 3)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif
    
            @for($i = $posts->currentPage() - 2; $i < $posts->currentPage(); $i++)
                @if($i > 0)
                    <li class="page-item">
                        <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor
    
            {{-- Página actual --}}
            <li class="page-item active"><span class="page-link">{{ $posts->currentPage() }}</span></li>
    
            {{-- Páginas siguientes --}}
            @for($i = $posts->currentPage() + 1; $i <= $posts->currentPage() + 2 && $i <= $posts->lastPage(); $i++)
                <li class="page-item">
                    <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
    
            @if($posts->currentPage() < $posts->lastPage() - 2)
                <li class="page-item disabled"><span class="page-link">...</span></li>
            @endif
    
            {{-- Botón "Siguiente" --}}
            <li class="page-item {{ $posts->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $posts->nextPageUrl() }}" aria-label="Siguiente">&rsaquo;</a>
            </li>
    
            {{-- Botón "Última página" --}}
            <li class="page-item {{ $posts->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $posts->url($posts->lastPage()) }}" aria-label="Última página">&rsaquo;&rsaquo;</a>
            </li>
        </ul>
    </nav>

@endsection