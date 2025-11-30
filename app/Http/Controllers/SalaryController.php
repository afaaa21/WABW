<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee; // Import model Employee
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        // Eager loading relasi employee
        $salaries = Salary::with('employee')->latest()->paginate(5);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan'       => 'required|string|max:10', // misal: "Jan 2025"
            'gaji_pokok'  => 'required|numeric',
            'tunjangan'   => 'numeric',
            'potongan'    => 'numeric',
            'total_gaji'  => 'required|numeric',
        ]);

        Salary::create($request->all());

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil disimpan.');
    }

    public function edit(string $id)
    {
        $salary = Salary::findOrFail($id);
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan'       => 'required|string|max:10',
            'gaji_pokok'  => 'required|numeric',
            'tunjangan'   => 'numeric',
            'potongan'    => 'numeric',
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