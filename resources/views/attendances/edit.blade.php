@extends('layouts.app')

@section('title', 'Edit Attendance - App Pegawai')

@section('content')
<div>
    <div class="mb-6">
        <a href="{{ route('attendances.index') }}" class="text-blue-600 hover:text-blue-700 mb-4 inline-flex items-center space-x-2">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Attendance</span>
        </a>
        <h2 class="text-3xl font-bold text-gray-800 mt-2">Edit Absensi</h2>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 max-w-xl">
        <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Karyawan:</label>
                    <select
                        name="employee_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('employee_id') border-red-500 @enderror"
                        required
                    >
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('employee_id', $attendance->employee_id) == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal:</label>
                    <input
                        type="date"
                        name="tanggal"
                        value="{{ old('tanggal', $attendance->tanggal) }}"
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
                        value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}"
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
                        value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('waktu_keluar') border-red-500 @enderror"
                    />
                    @error('waktu_keluar')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status:</label>
                    <select
                        name="status"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('status') border-red-500 @enderror"
                        required
                    >
                        <option value="Hadir" {{ old('status', $attendance->status) == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="Sakit" {{ old('status', $attendance->status) == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="Izin" {{ old('status', $attendance->status) == 'Izin' ? 'selected' : '' }}>Izin</option>
                        <option value="Alpa" {{ old('status', $attendance->status) == 'Alpa' ? 'selected' : '' }}>Alpa</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <button
                        type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                    >
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection