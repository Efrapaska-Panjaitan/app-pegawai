@extends('master')
@section('title', 'Detail Jabatan')
@section('content')
<h2>Detail Jabatan</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>Nama Jabatan</th>
        <td>{{ $position->nama_jabatan }}</td>
    </tr>
    <tr>
        <th>Gaji Pokok</th>
        <td>{{ $position->gaji_pokok }}</td>
    </tr>
</table>
@endsection
