@extends('master')
@section('title', 'Tambah Departemen')
@section('content')
<h2>Form Tambah Departemen</h2>
<form action="{{ route('departments.store') }}" method="POST">
    @csrf
    <label>Nama Departemen:</label>
    <input type="text" name="nama_departemen" required><br><br>
    <button type="submit">Simpan</button>
</form>
@endsection
