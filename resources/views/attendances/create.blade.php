@extends('layouts.app')

@section('title', 'Record Attendance - App Pegawai')

@section('content')
<div>
    <div class="mb-6">
        <a href="{{ route('attendances.index') }}" class="text-blue-600 hover:text-blue-700 mb-4 inline-flex items-center space-x-2">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Attendance</span>
        </a>
        <h2 class="text-3xl font-bold text-gray-800 mt-2">Tambah Absensi</h2>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 max-w-xl">
        <form action="{{ route('attendances.store') }}" method="POST">
            @csrf
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Karyawan:</label>
                    <select
                        name="karyawan_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('employee_id') border-red-500 @enderror"
                        required
                    >
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                    @error('karyawan_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal:</label>
                    <input
                        type="date"
                        name="tanggal"
                        value="{{ old('tanggal') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tanggal') border-red-500 @enderror"
                        required
                    />
                    @error('tanggal')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Waktu Masuk:</label>
                    <input
                        type="time"
                        name="waktu_masuk"
                        value="{{ old('waktu_masuk') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('waktu_masuk') border-red-500 @enderror"
                        required
                    />
                    @error('waktu_masuk')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Waktu Keluar:</label>
                    <input
                        type="time"
                        name="waktu_keluar"
                        value="{{ old('waktu_keluar') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('waktu_keluar') border-red-500 @enderror"
                    />
                    @error('waktu_keluar')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status:</label>
                    <select
                        name="status_absensi"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('status') border-red-500 @enderror"
                        required
                    >
                        <option value="hadir" {{ old('status_absensi') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="sakit" {{ old('status_absensi') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="izin" {{ old('status_absensi') == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="alpha" {{ old('status_absensi') == 'alpha' ? 'selected' : '' }}>Alpa</option>
                    </select>
                    @error('status_absensi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <button
                        type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                    >
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection