@extends('master')
@section('title', 'Data Departemen')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Data Departemen</h2>
        <a href="{{ route('departements.create') }}" class="btn btn-primary">+ Tambah Departemen</a>
    </div>

    <table>
        <thead>
            <tr>
                <th width="50">No</th>
                <th>Nama Departemen</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departements as $dept)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dept->nama_departemen }}</td>
                <td>
                    <a href="{{ route('departements.edit', $dept->id) }}" class="btn btn-success" style="font-size: 12px; padding: 5px 10px;">Edit</a>
                    <form action="{{ route('departements.destroy', $dept->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
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
        {{ $departements->links() }}
    </div>
@endsection