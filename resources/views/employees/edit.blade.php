@extends('layouts.app')

@section('title', 'Edit Employee - App Pegawai')

@section('content')
<div>
    <div class="mb-6">
        <a href="{{ route('employees.index') }}" class="text-blue-600 hover:text-blue-700 mb-4 inline-flex items-center space-x-2">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Employees</span>
        </a>
        <h2 class="text-3xl font-bold text-gray-800 mt-2">Edit Pegawai</h2>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap:</label>
                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama', $employee->nama) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama') border-red-500 @enderror"
                        required
                    />
                    @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email:</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $employee->email) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                        required
                    />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon:</label>
                    <input
                        type="tel"
                        name="nomor_telepon"
                        value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nomor_telepon') border-red-500 @enderror"
                        required
                    />
                    @error('nomor_telepon')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir:</label>
                    <input
                        type="date"
                        name="tanggal_lahir"
                        value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tanggal_lahir') border-red-500 @enderror"
                        required
                    />
                    @error('tanggal_lahir')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat:</label>
                    <textarea
                        name="alamat"
                        rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('alamat') border-red-500 @enderror"
                        required
                    >{{ old('alamat', $employee->alamat) }}</textarea>
                    @error('alamat')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Masuk:</label>
                    <input
                        type="date"
                        name="tanggal_masuk"
                        value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tanggal_masuk') border-red-500 @enderror"
                        required
                    />
                    @error('tanggal_masuk')
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
                        <option value="Aktif" {{ old('status', $employee->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Tidak Aktif" {{ old('status', $employee->status) == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Departemen:</label>
                    <select
                        name="department_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('department_id') border-red-500 @enderror"
                        required
                    >
                        <option value="">-- Pilih Departemen --</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                                {{ $department->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jabatan:</label>
                    <select
                        name="position_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('position_id') border-red-500 @enderror"
                        required
                    >
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}" {{ old('position_id', $employee->position_id) == $position->id ? 'selected' : '' }}>
                                {{ $position->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('position_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <button
                        type="submit"
                        class="w-full px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                    >
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection