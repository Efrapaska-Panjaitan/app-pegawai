@extends('master')
@section('title', 'Detail Departemen')
@section('content')
<h2>Detail Departemen</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <td>{{ $department->id }}</td>
    </tr>
    <tr>
        <th>Nama Departemen</th>
        <td>{{ $department->nama_departemen }}</td>
    </tr>
</table>
@endsection
