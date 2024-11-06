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
        $galleries = Galery::all();
        $agendaPosts = Post::whereHas('kategori', function ($query) {
            $query->where('judul', 'Agenda');
        })->orderBy('created_at', 'desc')->limit(3)->get();
        $latestNewsPosts = Post::whereHas('kategori', function ($query) {
            $query->where('judul', 'Informasi');
        })->latest()->limit(10)->orderBy('created_at', 'desc')->get();

        return view('landing-page', compact('galleries', 'agendaPosts', 'latestNewsPosts'));
    }
}
