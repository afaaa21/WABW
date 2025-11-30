@extends('master')
@section('title', 'Tambah Departemen')

@section('content')
    <h2>Tambah Departemen</h2>
    <form action="{{ route('departements.store') }}" method="POST">
        @csrf
        <label>Nama Departemen</label>
        <input type="text" name="nama_departemen" required placeholder="Contoh: IT, HRD, Keuangan">

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('departements.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection