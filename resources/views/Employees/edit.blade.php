@extends('master')

@section('title', 'Edit Pegawai')

@section('content')
    <h2>Edit Data Pegawai</h2>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $employee->email) }}" required>

        <label>Nomor Telepon</label>
        <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}" required>

        <label>Departemen</label>
        <select name="departemen_id" required>
            <option value="">-- Pilih Departemen --</option>
            @foreach($departements as $dept)
                <option value="{{ $dept->id }}" {{ old('departemen_id', $employee->departemen_id) == $dept->id ? 'selected' : '' }}>
                    {{ $dept->nama_departemen }}
                </option>
            @endforeach
        </select>

        <label>Jabatan</label>
        <select name="jabatan_id" required>
            <option value="">-- Pilih Jabatan --</option>
            @foreach($positions as $pos)
                <option value="{{ $pos->id }}" {{ old('jabatan_id', $employee->jabatan_id) == $pos->id ? 'selected' : '' }}>
                    {{ $pos->nama_jabatan }}
                </option>
            @endforeach
        </select>

        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" required>

        <label>Alamat</label>
        <textarea name="alamat" rows="3" required>{{ old('alamat', $employee->alamat) }}</textarea>

        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" required>

        <label>Status</label>
        <select name="status" required>
            <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </select>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('employees.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection