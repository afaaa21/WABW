@extends('master')
@section('title', 'Edit Jabatan')

@section('content')
    <h2>Edit Jabatan</h2>
    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Nama Jabatan</label>
        <input type="text" name="nama_jabatan" value="{{ old('nama_jabatan', $position->nama_jabatan) }}" required>

        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" value="{{ old('gaji_pokok', $position->gaji_pokok) }}" required>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('positions.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection