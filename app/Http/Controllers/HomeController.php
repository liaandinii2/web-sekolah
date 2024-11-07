<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mendapatkan data Galeri dengan kategori 'Galeri' dan status post 'publish'
        $galleries = Galery::whereHas('post.kategori', function ($query) {
            $query->where('judul', 'Galeri');
        })
        ->where('status', 1)
        ->whereHas('post', function ($query) {
            $query->where('status', 'publish');
        })
        ->orderBy('created_at', 'desc')
        ->get();

        // Mendapatkan data Galeri dengan kategori 'Agenda' dan status post 'publish'
        $agendaPosts = Galery::whereHas('post.kategori', function ($query) {
            $query->where('judul', 'Agenda');
        })
        ->where('status', 1)
        ->whereHas('post', function ($query) {
            $query->where('status', 'publish');
        })
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

        // Mendapatkan data Galeri dengan kategori 'Informasi' dan status post 'publish'
        $latestNewsPosts = Galery::whereHas('post.kategori', function ($query) {
            $query->where('judul', 'Informasi');
        })
        ->where('status', 1)
        ->whereHas('post', function ($query) {
            $query->where('status', 'publish');
        })
        ->latest()
        ->limit(6)
        ->get()
        ->map(function ($galery) {
            // Pastikan ada foto yang terkait
            $galery->firstFoto = $galery->fotos()->first();
            return $galery;
        });

        return view('landing-page', compact('galleries', 'agendaPosts', 'latestNewsPosts'));
    }
}
