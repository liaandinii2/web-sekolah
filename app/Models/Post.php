<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'kategori_id', 'isi', 'petugas_id', 'status'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function galery()
    {
        return $this->hasMany(Galery::class);
    }

}
