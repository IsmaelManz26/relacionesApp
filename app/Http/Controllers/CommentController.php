<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'apodo'  => 'required|min:5|max:40',
            'correo' => 'required|min:6|max:100',
            'texto'   => 'required|min:10',
        ]);
        $post_id = $request->post_id;
        $post = Post::find($post_id);
        if($post == null) {
            abort(404);
        }
        $comment = new Comment($request->all());
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
    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
{
    $request->validate([
        'correo' => 'required|email',
        'texto' => 'required|string|max:255',
    ]);

    // Verificar que el correo coincida
    if ($request->input('correo') !== $comment->correo) {
        return back()->withErrors(['correo' => 'El correo no coincide con el del comentario original.']);
    }

    // Verificar que la vida del comentario sea menor a 10 minutos
    $commentAge = now()->diffInMinutes($comment->created_at);
    if ($commentAge > 10) {
        return back()->withErrors(['texto' => 'El comentario solo puede ser editado dentro de los primeros 10 minutos.']);
    }

    $comment->update([
        'texto' => $request->input('texto'),
    ]);

    return redirect()->route('post.show', $comment->post_id)->with('success', 'Comentario actualizado correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }

    
}
