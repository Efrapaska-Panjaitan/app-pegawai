@extends('master')
@section('title', 'Tambah Jabatan')
@section('content')
<h2>Form Tambah Jabatan</h2>
<form action="{{ route('positions.store') }}" method="POST">
    @csrf
    <label>Nama Jabatan:</label>
    <input type="text" name="nama_jabatan"><br><br>

    <label>Gaji Pokok:</label>
    <input type="number" name="gaji_pokok" step="0.01"><br><br>

    <button type="submit">Simpan</button>
</form>
@endsection
