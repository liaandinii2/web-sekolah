<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $kategori = Kategori::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.kategori.index', [
            'kategori' => $kategori,
            'title' => 'Kategori',
        ]);
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('admin.kategori.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'judul' => 'required|string|max:255|unique:kategori',
        ]);

        Kategori::create($request->only('judul'));

        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully.');
    }
    public function show(Kategori $kategori)
    {
        return view('admin.kategori.show', compact('kategori'));
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'judul' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->judul = $request->judul;
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori deleted successfully.');
    }

}
