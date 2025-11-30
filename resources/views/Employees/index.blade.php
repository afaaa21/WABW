@extends('master')

@section('title', 'Daftar Pegawai')
@section('page-title', 'Daftar Pegawai')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Data Pegawai</h2>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">+ Tambah Pegawai</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $employee->nama_lengkap }}</td>
                <td>{{ $employee->department->nama_departemen ?? '-' }}</td>
                <td>{{ $employee->position->nama_jabatan ?? '-' }}</td>
                <td>{{ $employee->email }}</td>
                <td>
                    <span style="padding: 5px; border-radius: 4px; background-color: {{ $employee->status == 'aktif' ? '#d4edda' : '#f8d7da' }}; color: {{ $employee->status == 'aktif' ? '#155724' : '#721c24' }};">
                        {{ ucfirst($employee->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-warning" style="padding: 5px 10px; font-size: 12px;">Detail</a>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-success" style="padding: 5px 10px; font-size: 12px;">Edit</a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 12px;">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        {{ $employees->links() }}
    </div>
@endsection