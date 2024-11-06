<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource with pagination.
     */
    public function index()
    {
        $petugas = Petugas::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.manajemen-admin.index', [
            'petugas' => $petugas,
            'title' => 'Manajemen Admin',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manajemen-admin.create'); // Show the form to create a new petugas
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|string|max:255|unique:petugas',
            'password' => 'required|string|min:8', // Ensure a minimum password length
        ]);

        // Create a new petugas with hashed password
        Petugas::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $petugas = Petugas::findOrFail($id); // Find the petugas by ID
        return view('admin.manajemen-admin.show', compact('petugas')); // Show the details of the petugas
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petugas = Petugas::findOrFail($id); // Find the petugas by ID
        return view('admin.manajemen-admin.edit', compact('petugas')); // Show the form to edit the petugas
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|string|max:255|unique:petugas,username,' . $id,
            'password' => 'nullable|string|min:8', // Allow password to be optional for updates
        ]);

        // Find the petugas and update
        $petugas = Petugas::findOrFail($id);

        // Update fields
        $petugas->username = $request->username;

        // Hash the password only if it's being updated
        if ($request->filled('password')) {
            $petugas->password = Hash::make($request->password);
        }

        $petugas->save();

        return redirect()->route('petugas.index')->with('success', 'Petugas updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = Petugas::findOrFail($id); // Find the petugas by ID
        $petugas->delete(); // Delete the petugas

        return redirect()->route('petugas.index')->with('success', 'Petugas deleted successfully.');
    }
}
