<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\Post;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index()
    {
        $galeris = Galery::with('post', 'fotos')->orderBy('created_at', 'desc')->paginate(5);
        $posts = Post::all();
        return view('admin.galeri.index', [
            'galeris' => $galeris,
            'posts' => $posts,
            'title' => 'Galeri',
        ]);
    }

    public function create()
    {
        $posts = Post::all(); // Fetch all posts
        return view('admin.galeri.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'nullable|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|integer',
        ]);

        Galery::create($request->all());

        return redirect()->route('galeri.index')->with('success', 'Gallery created successfully.');
    }

    public function edit($id)
    {
        $galeri = Galery::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'post_id' => 'nullable|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|integer',
        ]);

        $galeri = Galery::findOrFail($id);
        $galeri->update($request->all());

        return redirect()->route('galeri.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy($id)
    {
        $galeri = Galery::findOrFail($id);
        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Gallery deleted successfully.');
    }
}
