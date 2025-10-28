@extends('master')
@section('title', 'Edit Absensi')
@section('content')
<h2>Edit Absensi</h2>
<form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Karyawan:</label>
    <select name="karyawan_id">
        @foreach ($employees as $e)
        <option value="{{ $e->id }}" {{ $attendance->karyawan_id == $e->id ? 'selected' : '' }}>
            {{ $e->nama_lengkap }}
        </option>
        @endforeach
    </select><br><br>

    <label>Tanggal:</label>
    <input type="date" name="tanggal" value="{{ old('tanggal', $attendance->tanggal) }}"><br><br>

    <label>Waktu Masuk:</label>
    <input type="time" name="waktu_masuk" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}"><br><br>

    <label>Waktu Keluar:</label>
    <input type="time" name="waktu_keluar" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}"><br><br>

    <label>Status:</label>
    <select name="status_absensi">
        @foreach(['hadir','izin','sakit','alpha'] as $status)
        <option value="{{ $status }}" {{ $attendance->status_absensi == $status ? 'selected' : '' }}>
            {{ ucfirst($status) }}
        </option>
        @endforeach
    </select><br><br>

    <button type="submit">Update</button>
</form>
@endsection
