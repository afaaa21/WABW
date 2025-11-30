@extends('master')
@section('title', 'Input Gaji')

@section('content')
    <h2>Input Gaji Pegawai</h2>
    <form action="{{ route('salaries.store') }}" method="POST">
        @csrf
        
        <label>Nama Pegawai</label>
        <select name="karyawan_id" required>
            <option value="">-- Pilih Pegawai --</option>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
            @endforeach
        </select>

        <label>Bulan (Contoh: Januari 2025)</label>
        <input type="text" name="bulan" required>

        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" id="gaji_pokok" required>

        <label>Tunjangan</label>
        <input type="number" name="tunjangan" id="tunjangan" value="0">

        <label>Potongan</label>
        <input type="number" name="potongan" id="potongan" value="0">

        <label>Total Gaji (Otomatis / Manual)</label>
        <input type="number" name="total_gaji" id="total_gaji" required>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Simpan</button>
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