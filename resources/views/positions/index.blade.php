@extends('master')
@section('title', 'Data Jabatan')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Data Jabatan</h2>
        <a href="{{ route('positions.create') }}" class="btn btn-primary">+ Tambah Jabatan</a>
    </div>

    <table>
        <thead>
            <tr>
                <th width="50">No</th>
                <th>Nama Jabatan</th>
                <th>Gaji Pokok</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($positions as $pos)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pos->nama_jabatan }}</td>
                <td>Rp {{ number_format($pos->gaji_pokok, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('positions.edit', $pos->id) }}" class="btn btn-success" style="font-size: 12px; padding: 5px 10px;">Edit</a>
                    <form action="{{ route('positions.destroy', $pos->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
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
        {{ $positions->links() }}
    </div>
@endsection