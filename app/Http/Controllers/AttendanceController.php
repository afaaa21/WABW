<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee; // Import model Employee untuk dropdown
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        // Menggunakan with('employee') agar query lebih efisien (Eager Loading)
        $attendances = Attendance::with('employee')->latest()->paginate(5);
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        // Kirim data karyawan untuk pilihan di dropdown (select option)
        $employees = Employee::all();
        return view('attendance.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id'    => 'required|exists:employees,id',
            'tanggal'        => 'required|date',
            'waktu_masuk'    => 'nullable',
            'waktu_keluar'   => 'nullable',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendance.index')
                         ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::all(); // Kirim data karyawan lagi untuk edit
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id'    => 'required|exists:employees,id',
            'tanggal'        => 'required|date',
            'waktu_masuk'    => 'nullable',
            'waktu_keluar'   => 'nullable',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
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