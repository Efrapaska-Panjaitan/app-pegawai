@extends('master')
@section('title', 'Data Absensi')
@section('content')
<h2>Data Absensi</h2>
<a href="{{ route('attendances.create') }}">+ Tambah Absensi</a>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Karyawan</th>
            <th>Tanggal</th>
            <th>Waktu Masuk</th>
            <th>Waktu Keluar</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($attendances as $a)
        <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->employee->nama_lengkap }}</td>
            <td>{{ $a->tanggal }}</td>
            <td>{{ $a->waktu_masuk ?? '-' }}</td>
            <td>{{ $a->waktu_keluar ?? '-' }}</td>
            <td>{{ ucfirst($a->status_absensi) }}</td>
            <td>
                <a href="{{ route('attendances.show', $a->id) }}">Detail</a> |
                <a href="{{ route('attendances.edit', $a->id) }}">Edit</a> |
                <form action="{{ route('attendances.destroy', $a->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
