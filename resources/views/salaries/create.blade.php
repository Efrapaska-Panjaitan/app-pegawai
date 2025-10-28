@extends('master')
@section('title', 'Tambah Gaji')
@section('content')
<h2>Tambah Data Gaji</h2>
<form action="{{ route('salaries.store') }}" method="POST">
    @csrf
    <label>Karyawan:</label>
    <select name="karyawan_id">
        @foreach ($employees as $e)
        <option value="{{ $e->id }}">{{ $e->nama_lengkap }}</option>
        @endforeach
    </select><br><br>

    <label>Bulan:</label>
    <input type="text" name="bulan" placeholder="contoh: 10-2025"><br><br>

    <label>Gaji Pokok:</label>
    <input type="number" name="gaji_pokok" step="0.01"><br><br>

    <label>Tunjangan:</label>
    <input type="number" name="tunjangan" step="0.01"><br><br>

    <label>Potongan:</label>
    <input type="number" name="potongan" step="0.01"><br><br>

    <button type="submit">Simpan</button>
</form>
@endsection
