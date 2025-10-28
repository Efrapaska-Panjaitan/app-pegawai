@extends('master')
@section('title', 'Tambah Absensi')
@section('content')
<h2>Tambah Absensi</h2>
<form action="{{ route('attendances.store') }}" method="POST">
    @csrf
    <label>Karyawan:</label>
    <select name="karyawan_id">
        @foreach ($employees as $e)
        <option value="{{ $e->id }}">{{ $e->nama_lengkap }}</option>
        @endforeach
    </select><br><br>

    <label>Tanggal:</label>
    <input type="date" name="tanggal"><br><br>

    <label>Waktu Masuk:</label>
    <input type="time" name="waktu_masuk"><br><br>

    <label>Waktu Keluar:</label>
    <input type="time" name="waktu_keluar"><br><br>

    <label>Status:</label>
    <select name="status_absensi">
        <option value="hadir">Hadir</option>
        <option value="izin">Izin</option>
        <option value="sakit">Sakit</option>
        <option value="alpha">Alpha</option>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>
@endsection
