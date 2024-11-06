<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Post;
use App\Models\Agenda;
use App\Models\Galery;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve counts for each category dynamically
        $petugasCount = Petugas::count();
        $postCount = Post::count();
        $galeriCount = Post::whereHas('kategori', function ($query) {
            $query->where('judul', 'Galeri');
        })->count();
        $agendaCount = Post::whereHas('kategori', function ($query) {
            $query->where('judul', 'Agenda');
        })->count();

        // Pass the counts to the view
        return view('admin.dashboard.index', [
            'title' => 'Dashboard',
            'petugasCount' => $petugasCount,
            'postCount' => $postCount,
            'galeriCount' => $galeriCount,
            'agendaCount' => $agendaCount,
        ]);
    }
}
