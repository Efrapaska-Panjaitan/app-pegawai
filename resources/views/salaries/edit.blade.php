@extends('master')
@section('title', 'Edit Gaji')
@section('content')
<h2>Edit Data Gaji</h2>
<form action="{{ route('salaries.update', $salary->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Karyawan:</label>
    <select name="karyawan_id">
        @foreach ($employees as $e)
        <option value="{{ $e->id }}" {{ $salary->karyawan_id == $e->id ? 'selected' : '' }}>
            {{ $e->nama_lengkap }}
        </option>
        @endforeach
    </select><br><br>

    <label>Bulan:</label>
    <input type="text" name="bulan" value="{{ old('bulan', $salary->bulan) }}"><br><br>

    <label>Gaji Pokok:</label>
    <input type="number" name="gaji_pokok" step="0.01" value="{{ old('gaji_pokok', $salary->gaji_pokok) }}"><br><br>

    <label>Tunjangan:</label>
    <input type="number" name="tunjangan" step="0.01" value="{{ old('tunjangan', $salary->tunjangan) }}"><br><br>

    <label>Potongan:</label>
    <input type="number" name="potongan" step="0.01" value="{{ old('potongan', $salary->potongan) }}"><br><br>

    <button type="submit">Update</button>
</form>
@endsection
