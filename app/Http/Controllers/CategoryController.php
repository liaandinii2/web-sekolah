<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan 10 kategori per halaman
        $categories = Category::paginate(3);

        return view('admin.categories.index', [
            'title' => 'Kategori',
            'categories' => $categories,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Mencari kategori berdasarkan ID
        $category = Category::findOrFail($id);

        // Update data kategori
        $category->update([
            'title' => $request->title,
        ]);

        // Kembali ke halaman index dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus');
    }
}
