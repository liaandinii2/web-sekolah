<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    //relasi ke category one to one
    public function category()
    {
        return $this->BelongsTo(category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
