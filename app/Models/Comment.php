<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable = ['apodo', 'correo', 'post_id', 'texto'];

    //relacion de comment a post: de muchos a uno
    public function post(): BelongsTo {
        return $this->belongsTo(Post::class);
    }

}