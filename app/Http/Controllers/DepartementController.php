<?php

namespace App\Http\Controllers;

use App\Models\Departement; // Perhatikan ejaan 'Departement'
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::latest()->paginate(5);
        return view('departements.index', compact('departements'));
    }

    public function create()
    {
        return view('departements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100',
        ]);

        Departement::create($request->all());

        return redirect()->route('departements.index')
                         ->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $departement = Departement::findOrFail($id);
        return view('departements.edit', compact('departement'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100',
        ]);

        $departement = Departement::findOrFail($id);
        $departement->update($request->all());

        return redirect()->route('departements.index')
                         ->with('success', 'Departemen berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $departement = Departement::findOrFail($id);
        $departement->delete();

        return redirect()->route('departements.index')
                         ->with('success', 'Departemen berhasil dihapus.');
    }
}