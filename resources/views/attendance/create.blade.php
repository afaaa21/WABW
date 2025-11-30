@extends('master')
@section('title', 'Catat Absensi')

@section('content')
    <h2>Catat Absensi Baru</h2>
    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        
        <label>Nama Pegawai</label>
        <select name="karyawan_id" required>
            <option value="">-- Pilih Pegawai --</option>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
            @endforeach
        </select>

        <label>Tanggal</label>
        <input type="date" name="tanggal" required>

        <label>Waktu Masuk</label>
        <input type="time" name="waktu_masuk">

        <label>Waktu Keluar</label>
        <input type="time" name="waktu_keluar">

        <label>Status</label>
        <select name="status_absensi" required>
            <option value="hadir">Hadir</option>
            <option value="izin">Izin</option>
            <option value="sakit">Sakit</option>
            <option value="alpha">Alpha</option>
        </select>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('attendance.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection