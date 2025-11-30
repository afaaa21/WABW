<?php

namespace App\Http\Controllers;

use App\Models\Position; // Pastikan import Model yang benar
use Illuminate\Http\Request;

class PositionController extends Controller
{
    // 1. TAMPILKAN DATA (READ)
    public function index()
    {
        $positions = Position::latest()->paginate(5);
        return view('positions.index', compact('positions'));
    }

    // 2. FORM TAMBAH (CREATE)
    public function create()
    {
        return view('positions.create');
    }

    // 3. SIMPAN DATA (STORE)
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'gaji_pokok' => 'required|numeric',
        ]);

        Position::create($request->all());

        return redirect()->route('positions.index')
                         ->with('success', 'Jabatan berhasil ditambahkan.');
    }

    // 4. FORM EDIT
    public function edit(string $id)
    {
        $position = Position::findOrFail($id);
        return view('positions.edit', compact('position'));
    }

    // 5. UPDATE DATA
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'gaji_pokok' => 'required|numeric',
        ]);

        $position = Position::findOrFail($id);
        $position->update($request->all());

        return redirect()->route('positions.index')
                         ->with('success', 'Jabatan berhasil diperbarui.');
    }

    // 6. HAPUS DATA (DELETE)
    public function destroy(string $id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('positions.index')
                         ->with('success', 'Jabatan berhasil dihapus.');
    }
}