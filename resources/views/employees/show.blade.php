@extends('layouts.app')

@section('title', 'Detail Pegawai - ' . $employee->nama_lengkap)

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-2xl font-semibold text-gray-800">Detail Pegawai</h2>
        <a href="{{ route('employees.index') }}" class="text-blue-600 hover:text-blue-800">&larr; Kembali</a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <table class="w-full table-auto border-collapse">
            <tbody>
                <tr class="border-b">
                    <th class="text-left py-2 px-4 w-1/3">Nama Lengkap</th>
                    <td class="py-2 px-4">{{ $employee->nama_lengkap }}</td>
                </tr>
                <tr class="border-b">
                    <th class="text-left py-2 px-4">Email</th>
                    <td class="py-2 px-4">{{ $employee->email }}</td>
                </tr>
                <tr class="border-b">
                    <th class="text-left py-2 px-4">Nomor Telepon</th>
                    <td class="py-2 px-4">{{ $employee->nomor_telepon }}</td>
                </tr>
                <tr class="border-b">
                    <th class="text-left py-2 px-4">Tanggal Lahir</th>
                    <td class="py-2 px-4">{{ $employee->tanggal_lahir }}</td>
                </tr>
                <tr class="border-b">
                    <th class="text-left py-2 px-4">Alamat</th>
                    <td class="py-2 px-4">{{ $employee->alamat }}</td>
                </tr>
                <tr class="border-b">
                    <th class="text-left py-2 px-4">Tanggal Masuk</th>
                    <td class="py-2 px-4">{{ $employee->tanggal_masuk }}</td>
                </tr>
                <tr>
                    <th class="text-left py-2 px-4">Status</th>
                    <td class="py-2 px-4">{{ ucfirst($employee->status) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection