@extends('master')
@section('title', 'Detail Gaji')
@section('content')
<h2>Detail Data Gaji</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>Nama Karyawan</th>
        <td>{{ $salary->employee->nama_lengkap }}</td>
    </tr>
    <tr>
        <th>Bulan</th>
        <td>{{ $salary->bulan }}</td>
    </tr>
    <tr>
        <th>Gaji Pokok</th>
        <td>{{ $salary->gaji_pokok }}</td>
    </tr>
    <tr>
        <th>Tunjangan</th>
        <td>{{ $salary->tunjangan }}</td>
    </tr>
    <tr>
        <th>Potongan</th>
        <td>{{ $salary->potongan }}</td>
    </tr>
    <tr>
        <th>Total Gaji</th>
        <td><b>{{ $salary->total_gaji }}</b></td>
    </tr>
</table>
@endsection
