@extends('master')
@section('title', 'Data Absensi')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Data Absensi</h2>
        <a href="{{ route('attendance.create') }}" class="btn btn-primary">+ Catat Absensi</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Tanggal</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $att)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $att->employee->nama_lengkap ?? '-' }}</td>
                <td>{{ $att->tanggal }}</td>
                <td>{{ $att->waktu_masuk ?? '-' }}</td>
                <td>{{ $att->waktu_keluar ?? '-' }}</td>
                <td>{{ ucfirst($att->status_absensi) }}</td>
                <td>
                    <a href="{{ route('attendance.edit', $att->id) }}" class="btn btn-success" style="font-size: 12px; padding: 5px 10px;">Edit</a>
                    <form action="{{ route('attendance.destroy', $att->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
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
        {{ $attendances->links() }}
    </div>
@endsection