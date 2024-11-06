<?php

namespace App\Http\Controllers;

use App\Models\Kategori; // Ensure Kategori model is used for categories
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a paginated listing of the posts.
     */
    public function index()
    {
        $posts = Post::with('kategori', 'petugas')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.posts.index', [
            'posts' => $posts,
            'title' => 'Posts',
        ]);
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        $categories = Kategori::all(); // Fetch all categories

        return view('admin.posts.create', [
            'categories' => $categories,
            'title' => 'Create Post',
        ]);
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id', // Ensure category exists
            'status' => 'required|in:publish,draft', // Validate status
            'isi' => 'required|string', // Validate content
        ]);

        // Create a new post
        Post::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori_id' => $request->kategori_id,
            'petugas_id' => Auth::id(), // Automatically assign the authenticated user's ID
            'status' => $request->status,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Kategori::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id', // Ensure category exists
            'status' => 'required|in:publish,draft', // Validate status
            'isi' => 'required|string', // Validate content
        ]);

        $post = Post::findOrFail($id); // Find the post by ID or fail
        $post->update([ // Update the post with validated data
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori_id' => $request->kategori_id,
            'status' => $request->status,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui');
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete(); // Delete the post

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus');
    }
}
