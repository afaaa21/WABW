@extends('master')

@section('title', 'Input Gaji')

@section('content')
    <div class="page-header">
        <h2>Input Gaji Pegawai</h2>
    </div>

    <form action="{{ route('salaries.store') }}" method="POST">
        @csrf
        
        <!-- Pilihan Nama Pegawai -->
        <label for="karyawan_id">Nama Pegawai</label>
        <select name="karyawan_id" id="karyawan_id" required>
            <option value="">-- Pilih Pegawai --</option>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
            @endforeach
        </select>

        <!-- Input Bulan -->
        <label for="bulan">Bulan (Contoh: Januari 2025)</label>
        <input type="text" name="bulan" id="bulan" required placeholder="Masukkan bulan dan tahun">

        <!-- Input Gaji Pokok -->
        <label for="gaji_pokok">Gaji Pokok</label>
        <input type="number" name="gaji_pokok" id="gaji_pokok" required placeholder="0">

        <!-- Input Tunjangan -->
        <label for="tunjangan">Tunjangan</label>
        <input type="number" name="tunjangan" id="tunjangan" value="0">

        <!-- Input Potongan -->
        <label for="potongan">Potongan</label>
        <input type="number" name="potongan" id="potongan" value="0">

        <!-- Input Total Gaji (Otomatis & Readonly) -->
        <label for="total_gaji">Total Gaji (Otomatis)</label>
        <input type="number" name="total_gaji" id="total_gaji" required readonly 
               style="background-color: #e9ecef; cursor: not-allowed; font-weight: bold; color: #333;">

        <!-- Tombol Aksi -->
        <div style="margin-top: 25px; display: flex; gap: 10px;">
            <button type="submit" class="btn btn-success">Simpan Data</button>
            <a href="{{ route('salaries.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
    
    <!-- Script Perhitungan Otomatis -->
    <script>
        // Ambil elemen-elemen input
        const gajiPokokInput = document.getElementById('gaji_pokok');
        const tunjanganInput = document.getElementById('tunjangan');
        const potonganInput = document.getElementById('potongan');
        const totalGajiInput = document.getElementById('total_gaji');

        // Fungsi untuk menghitung total
        function hitungGaji() {
            // Ambil nilai (jika kosong dianggap 0)
            const gapok = parseFloat(gajiPokokInput.value) || 0;
            const tunjangan = parseFloat(tunjanganInput.value) || 0;
            const potongan = parseFloat(potonganInput.value) || 0;

            // Rumus: Gaji Pokok + Tunjangan - Potongan
            const total = gapok + tunjangan - potongan;

            // Masukkan hasil ke input Total Gaji
            totalGajiInput.value = total;
        }

        // Pasang "pendengar" agar setiap kali mengetik, hitungan berjalan
        gajiPokokInput.addEventListener('input', hitungGaji);
        tunjanganInput.addEventListener('input', hitungGaji);
        potonganInput.addEventListener('input', hitungGaji);
    </script>
@endsection
```

