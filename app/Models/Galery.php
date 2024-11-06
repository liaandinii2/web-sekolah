<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    protected $table = 'galery';

    protected $fillable = ['post_id', 'position', 'status'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }
}
