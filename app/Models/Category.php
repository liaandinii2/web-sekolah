<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    //mendefinisikan field yang boleh di isi
    protected $fillable = ['title'];

    //relasi ke post
    public function posts(){
        return $this->hasMany(post::class);
    }

}
