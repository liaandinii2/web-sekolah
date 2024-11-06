<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Galery;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = Foto::with('galery')->paginate(5);
        $galeris = Galery::with('post')->get();
        return view('admin.foto.index', [
            'fotos' => $fotos,
            'galeris' => $galeris,
            'title' => 'Foto',
        ]);
    }

    public function create()
    {
        $galeris = Galery::with('post')->get();
        return view('admin.foto.create', compact('galeris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'galery_id' => 'required|exists:galery,id',
            'files.*' => 'required|file|mimes:jpg,jpeg,png|max:2048', // Validate each file
            'judul' => 'required|string|max:255',
        ]);

        foreach ($request->file('files') as $file) {
            $path = $file->store('uploads', 'public'); // Store files in the public/uploads directory

            // Create a new Foto record for each uploaded file
            Foto::create([
                'galery_id' => $request->galery_id,
                'file' => $path,
                'judul' => $request->judul,
            ]);
        }

        return redirect()->route('foto.index')->with('success', 'Photos added successfully.');
    }

    public function show($id)
    {
        $foto = Foto::findOrFail($id);
        return view('admin.foto.show', compact('foto'));
    }

    public function edit($id)
    {
        $foto = Foto::findOrFail($id);
        $galleries = Galery::all();
        return view('admin.foto.edit', compact('foto', 'galleries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'galery_id' => 'required|exists:galery,id',
            'file' => 'sometimes|file|mimes:jpg,jpeg,png|max:2048', // Validate file if provided
            'judul' => 'required|string|max:255',
        ]);

        $foto = Foto::findOrFail($id);

        // Update fields
        $data = [
            'galery_id' => $request->galery_id,
            'judul' => $request->judul,
        ];

        // If a file is uploaded, handle the upload
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads', 'public');
            $data['file'] = $path;
        }

        $foto->update($data);

        return redirect()->route('foto.index')->with('success', 'Photo updated successfully.');
    }

    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);
        $foto->delete();

        return redirect()->route('foto.index')->with('success', 'Photo deleted successfully.');
    }
}