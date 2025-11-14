@extends('layouts.app')

@section('title', 'Add Department - App Pegawai')

@section('content')
<div>
    <div class="mb-6">
        <a href="{{ route('departments.index') }}" class="text-blue-600 hover:text-blue-700 mb-4 inline-flex items-center space-x-2">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Departments</span>
        </a>
        <h2 class="text-3xl font-bold text-gray-800 mt-2">Form Tambah Departemen</h2>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 max-w-xl">
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Departemen:</label>
                    <input
                        type="text"
                        name="nama_departemen"
                        value="{{ old('nama_departemen') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama') border-red-500 @enderror"
                        required
                    />
                    @error('nama_departemen')
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