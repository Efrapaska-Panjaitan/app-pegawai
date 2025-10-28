@extends('master')
@section('title', 'Data Gaji')
@section('content')
<h2>Data Gaji</h2>
<a href="{{ route('salaries.create') }}">+ Tambah Gaji</a>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Nama Karyawan</th>
            <th>Bulan</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($salaries as $s)
        <tr>
            <td>{{ $s->employee->nama_lengkap }}</td>
            <td>{{ $s->bulan }}</td>
            <td>{{ $s->gaji_pokok }}</td>
            <td>{{ $s->tunjangan }}</td>
            <td>{{ $s->potongan }}</td>
            <td>{{ $s->total_gaji }}</td>
            <td>
                <a href="{{ route('salaries.show', $s->id) }}">Detail</a> |
                <a href="{{ route('salaries.edit', $s->id) }}">Edit</a> |
                <form action="{{ route('salaries.destroy', $s->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
