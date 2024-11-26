<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model {

    protected $table = 'post';

    protected $fillable = ['entrada', 'texto', 'titulo'];

    //relacion de post a comment: de 1 a muchos
    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

}