<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee; // PENTING: Import Model Employee
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        // with('employee') untuk menampilkan nama pegawai di tabel index
        $attendances = Attendance::with('employee')->latest()->paginate(5);
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        // AMBIL DATA PEGAWAI UNTUK DROPDOWN
        $employees = Employee::all();
        
        // Kirim variabel $employees ke view create
        return view('attendance.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id'    => 'required|exists:employees,id',
            'tanggal'        => 'required|date',
            'waktu_masuk'    => 'nullable', // Boleh kosong jika belum absen
            'waktu_keluar'   => 'nullable',
            'status_absensi' => 'required',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendance.index')
                         ->with('success', 'Absensi berhasil dicatat.');
    }

    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        
        // Saat edit juga perlu list pegawai jika ingin mengubah orangnya
        $employees = Employee::all(); 

        return view('attendance.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id'    => 'required|exists:employees,id',
            'tanggal'        => 'required|date',
            'waktu_masuk'    => 'nullable',
            'waktu_keluar'   => 'nullable',
            'status_absensi' => 'required',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());

        return redirect()->route('attendance.index')
                         ->with('success', 'Data absensi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendance.index')
                         ->with('success', 'Data absensi berhasil dihapus.');
    }
}