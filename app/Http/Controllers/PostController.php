<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$posts = Post::orderBy('id', 'desc')->get();
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        return view('post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'entrada' => 'required|min:60|max:250|unique:post',
            'texto'   => 'required|min:100',
            'titulo'  => 'required|min:25|max:60|unique:post',
        ]);
        $post = new Post($request->all());
        $post->texto = strip_tags($post->texto, env('PERMITTED_TAGS', ''));//sanitize
        try {
            $post->save();
            return redirect('/')->with('message', 'La noticia se ha insertado.');
        } catch(\Exception $e) {
            return back()->withInput()->withErrors('message', 'La noticia no se ha podido insertar.');
        }
    }

    function storeComment(Request $request, Post $post) {
        $request->validate([
            'apodo'  => 'required|min:5|max:40',
            'correo' => 'required|min:6|max:100',
            'texto'   => 'required|min:10',
        ]);
        $comment = new Comment($request->all());
        $comment->post_id = $post->id;
        try {
            $comment->save();
            return back()->with('message', 'El comentario se ha insertado.');
        } catch(\Exception $e) {
            return back()->withInput()->withErrors('message', 'El comentario no se ha podido insertar.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'entrada' => 'required|min:60|max:250|unique:post,entrada,' . $post->id,
            'texto'   => 'required|min:100',
            'titulo'  => 'required|min:25|max:60|unique:post,titulo,' . $post->id,
        ]);

        $post->update([
            'entrada' => $request->input('entrada'),
            'texto'   => strip_tags($request->input('texto'), env('PERMITTED_TAGS', '')),
            'titulo'  => $request->input('titulo'),
        ]);

        return redirect()->route('post.show', $post->id)->with('success', 'La noticia se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Eliminar los comentarios asociados
        $post->comments()->delete();

        // Eliminar la noticia
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Noticia eliminada correctamente.');
    }
}
