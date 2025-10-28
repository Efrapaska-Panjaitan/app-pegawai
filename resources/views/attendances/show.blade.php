@extends('master')
@section('title', 'Detail Absensi')
@section('content')
<h2>Detail Absensi</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>Nama Karyawan</th>
        <td>{{ $attendance->employee->nama_lengkap }}</td>
    </tr>
    <tr>
        <th>Tanggal</th>
        <td>{{ $attendance->tanggal }}</td>
    </tr>
    <tr>
        <th>Waktu Masuk</th>
        <td>{{ $attendance->waktu_masuk ?? '-' }}</td>
    </tr>
    <tr>
        <th>Waktu Keluar</th>
        <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ ucfirst($attendance->status_absensi) }}</td>
    </tr>
</table>
@endsection
