@extends('master')
@section('title', 'Data Gaji')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Data Gaji Pegawai</h2>
        <a href="{{ route('salaries.create') }}" class="btn btn-primary">+ Input Gaji</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Bulan</th>
                <th>Gaji Pokok</th>
                <th>Total Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salaries as $salary)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $salary->employee->nama_lengkap ?? '-' }}</td>
                <td>{{ $salary->bulan }}</td>
                <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                <td style="font-weight: bold;">Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-success" style="font-size: 12px; padding: 5px 10px;">Edit</a>
                    <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="font-size: 12px; padding: 5px 10px;">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        {{ $salaries->links() }}
    </div>
@endsection