@extends('master')
@section('title', 'Edit Gaji')

@section('content')
    <h2>Edit Gaji Pegawai</h2>
    <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Nama Pegawai</label>
        <select name="karyawan_id" required>
            <option value="">-- Pilih Pegawai --</option>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}" {{ $salary->karyawan_id == $emp->id ? 'selected' : '' }}>
                    {{ $emp->nama_lengkap }}
                </option>
            @endforeach
        </select>

        <label>Bulan</label>
        <input type="text" name="bulan" value="{{ $salary->bulan }}" required>

        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" id="gaji_pokok" value="{{ $salary->gaji_pokok }}" required>

        <label>Tunjangan</label>
        <input type="number" name="tunjangan" id="tunjangan" value="{{ $salary->tunjangan }}">

        <label>Potongan</label>
        <input type="number" name="potongan" id="potongan" value="{{ $salary->potongan }}">

        <label>Total Gaji</label>
        <input type="number" name="total_gaji" id="total_gaji" value="{{ $salary->total_gaji }}" required>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('salaries.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
    
    <script>
        const inputs = document.querySelectorAll('#gaji_pokok, #tunjangan, #potongan');
        inputs.forEach(input => {
            input.addEventListener('input', () => {
                const gapok = parseFloat(document.getElementById('gaji_pokok').value) || 0;
                const tunjangan = parseFloat(document.getElementById('tunjangan').value) || 0;
                const potongan = parseFloat(document.getElementById('potongan').value) || 0;
                document.getElementById('total_gaji').value = gapok + tunjangan - potongan;
            });
        });
    </script>
@endsection