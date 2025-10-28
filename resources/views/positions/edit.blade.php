@extends('master')
@section('title', 'Edit Jabatan')
@section('content')
<h2>Edit Data Jabatan</h2>
<form action="{{ route('positions.update', $position->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nama Jabatan:</label>
    <input type="text" name="nama_jabatan" value="{{ old('nama_jabatan', $position->nama_jabatan) }}"><br><br>

    <label>Gaji Pokok:</label>
    <input type="number" name="gaji_pokok" step="0.01" value="{{ old('gaji_pokok', $position->gaji_pokok) }}"><br><br>

    <button type="submit">Update</button>
</form>
@endsection
