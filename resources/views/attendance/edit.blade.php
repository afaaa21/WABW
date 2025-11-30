@extends('master')
@section('title', 'Edit Absensi')

@section('content')
    <h2>Edit Data Absensi</h2>
    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Nama Pegawai</label>
        <select name="karyawan_id" required>
            <option value="">-- Pilih Pegawai --</option>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}" {{ $attendance->karyawan_id == $emp->id ? 'selected' : '' }}>
                    {{ $emp->nama_lengkap }}
                </option>
            @endforeach
        </select>

        <label>Tanggal</label>
        <input type="date" name="tanggal" value="{{ $attendance->tanggal }}" required>

        <label>Waktu Masuk</label>
        <input type="time" name="waktu_masuk" value="{{ $attendance->waktu_masuk }}">

        <label>Waktu Keluar</label>
        <input type="time" name="waktu_keluar" value="{{ $attendance->waktu_keluar }}">

        <label>Status</label>
        <select name="status_absensi" required>
            <option value="hadir" {{ $attendance->status_absensi == 'hadir' ? 'selected' : '' }}>Hadir</option>
            <option value="izin" {{ $attendance->status_absensi == 'izin' ? 'selected' : '' }}>Izin</option>
            <option value="sakit" {{ $attendance->status_absensi == 'sakit' ? 'selected' : '' }}>Sakit</option>
            <option value="alpha" {{ $attendance->status_absensi == 'alpha' ? 'selected' : '' }}>Alpha</option>
        </select>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('attendance.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection