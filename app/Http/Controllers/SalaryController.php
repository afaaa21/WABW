<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee; // PENTING: Import Model Employee
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        // with('employee') agar nama pegawai muncul di tabel gaji
        $salaries = Salary::with('employee')->latest()->paginate(5);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        // AMBIL DATA PEGAWAI UNTUK DROPDOWN
        $employees = Employee::all();
        
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan'       => 'required',
            'gaji_pokok'  => 'required|numeric',
            'tunjangan'   => 'nullable|numeric',
            'potongan'    => 'nullable|numeric',
            'total_gaji'  => 'required|numeric',
        ]);

        Salary::create($request->all());

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil disimpan.');
    }

    public function edit(string $id)
    {
        $salary = Salary::findOrFail($id);
        
        // Ambil data pegawai lagi untuk dropdown edit
        $employees = Employee::all();

        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan'       => 'required',
            'gaji_pokok'  => 'required|numeric',
            'tunjangan'   => 'nullable|numeric',
            'potongan'    => 'nullable|numeric',
            'total_gaji'  => 'required|numeric',
        ]);

        $salary = Salary::findOrFail($id);
        $salary->update($request->all());

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $salary = Salary::findOrFail($id);
        $salary->delete();

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil dihapus.');
    }
}