@extends('master')
@section('title', 'Data Departemen')
@section('content')
<h2>Data Departemen</h2>
<a href="{{ route('departments.create') }}">+ Tambah Departemen</a>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Departemen</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departments as $dept)
        <tr>
            <td>{{ $dept->id }}</td>
            <td>{{ $dept->nama_departemen }}</td>
            <td>
                <a href="{{ route('departments.show', $dept->id) }}">Detail</a> |
                <a href="{{ route('departments.edit', $dept->id) }}">Edit</a> |
                <form action="{{ route('departments.destroy', $dept->id) }}" method="POST" style="display:inline;">
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
