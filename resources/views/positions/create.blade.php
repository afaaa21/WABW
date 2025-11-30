@extends('master')
@section('title', 'Tambah Jabatan')

@section('content')
    <h2>Tambah Jabatan</h2>
    <form action="{{ route('positions.store') }}" method="POST">
        @csrf
        <label>Nama Jabatan</label>
        <input type="text" name="nama_jabatan" required placeholder="Contoh: Manager, Staff">

        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" required placeholder="Contoh: 5000000">

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('positions.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection