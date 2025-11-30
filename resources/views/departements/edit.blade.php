@extends('master')
@section('title', 'Edit Departemen')

@section('content')
    <h2>Edit Departemen</h2>
    <form action="{{ route('departements.update', $departement->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Nama Departemen</label>
        <input type="text" name="nama_departemen" value="{{ old('nama_departemen', $departement->nama_departemen) }}" required>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('departements.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection