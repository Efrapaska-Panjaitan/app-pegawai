@extends('layouts.app')

@section('title', 'Add Position - App Pegawai')

@section('content')
<div>
    <div class="mb-6">
        <a href="{{ route('positions.index') }}" class="text-blue-600 hover:text-blue-700 mb-4 inline-flex items-center space-x-2">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Positions</span>
        </a>
        <h2 class="text-3xl font-bold text-gray-800 mt-2">Form Tambah Jabatan</h2>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 max-w-xl">
        <form action="{{ route('positions.store') }}" method="POST">
            @csrf
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Jabatan:</label>
                    <input
                        type="text"
                        name="nama_jabatan"
                        value="{{ old('nama_jabatan') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama') border-red-500 @enderror"
                        required
                    />
                    @error('nama_jabatan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gaji Pokok:</label>
                    <input
                        type="number"
                        name="gaji_pokok"
                        value="{{ old('gaji_pokok') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('gaji_pokok') border-red-500 @enderror"
                        required
                    />
                    @error('gaji_pokok')
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