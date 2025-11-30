<?php

namespace App\Http\Controllers;

use App\Models\Employee;
// PENTING: Import Model Departemen dan Jabatan agar bisa dipanggil
use App\Models\Departement;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Menggunakan with() agar query lebih cepat (Eager Loading)
        $employees = Employee::with(['department', 'position'])->latest()->paginate(5);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        // AMBIL DATA DEPARTEMEN & JABATAN
        // Inilah yang menyebabkan error sebelumnya jika baris ini tidak ada
        $departements = Departement::all();
        $positions = Position::all();

        // Kirim variabel $departements dan $positions ke View
        return view('employees.create', compact('departements', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:employees,email',
            'nomor_telepon' => 'required',
            'departemen_id' => 'required', // Validasi baru
            'jabatan_id' => 'required',    // Validasi baru
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'tanggal_masuk' => 'required|date',
            'status' => 'required',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
                         ->with('success', 'Pegawai berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $employee = Employee::with(['department', 'position'])->findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        
        // Saat edit juga butuh data ini untuk dropdown
        $departements = Departement::all();
        $positions = Position::all();

        return view('employees.edit', compact('employee', 'departements', 'positions'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'nomor_telepon' => 'required',
            'departemen_id' => 'required',
            'jabatan_id' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'tanggal_masuk' => 'required|date',
            'status' => 'required',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employees.index')
                         ->with('success', 'Data pegawai berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')
                         ->with('success', 'Pegawai berhasil dihapus.');
    }
}