@extends('master')

@section('title', 'Tambah Pegawai')

@section('content')
    <h2>Tambah Pegawai Baru</h2>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Nomor Telepon</label>
        <input type="text" name="nomor_telepon" required>

        <label>Departemen</label>
        <select name="departemen_id" required>
            <option value="">-- Pilih Departemen --</option>
            @foreach($departements as $dept)
                <option value="{{ $dept->id }}">{{ $dept->nama_departemen }}</option>
            @endforeach
        </select>

        <label>Jabatan</label>
        <select name="jabatan_id" required>
            <option value="">-- Pilih Jabatan --</option>
            @foreach($positions as $pos)
                <option value="{{ $pos->id }}">{{ $pos->nama_jabatan }}</option>
            @endforeach
        </select>

        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" required>

        <label>Alamat</label>
        <textarea name="alamat" rows="3" required></textarea>

        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" required>

        <label>Status</label>
        <select name="status" required>
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Nonaktif</option>
        </select>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('employees.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection