@extends('layouts.app')

@section('title', 'Edit Salary - App Pegawai')

@section('content')
<div>
    <div class="mb-6">
        <a href="{{ route('salaries.index') }}" class="text-blue-600 hover:text-blue-700 mb-4 inline-flex items-center space-x-2">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Salaries</span>
        </a>
        <h2 class="text-3xl font-bold text-gray-800 mt-2">Edit Data Gaji</h2>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 max-w-xl">
        <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Karyawan:</label>
                    <select
                        name="karyawan_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('karyawan_id') border-red-500 @enderror"
                        required
                    >
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('karyawan_id', $salary->karyawan_id) == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                    @error('karyawan_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Bulan:</label>
                    <input
                        type="month"
                        name="bulan"
                        value="{{ old('bulan', $salary->bulan) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('bulan') border-red-500 @enderror"
                        required
                    />
                    @error('bulan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gaji Pokok:</label>
                    <input
                        type="number"
                        name="gaji_pokok"
                        value="{{ old('gaji_pokok', $salary->gaji_pokok) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('gaji_pokok') border-red-500 @enderror"
                        required
                    />
                    @error('gaji_pokok')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tunjangan:</label>
                    <input
                        type="number"
                        name="tunjangan"
                        value="{{ old('tunjangan', $salary->tunjangan) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tunjangan') border-red-500 @enderror"
                        required
                    />
                    @error('tunjangan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Potongan:</label>
                    <input
                        type="number"
                        name="potongan"
                        value="{{ old('potongan', $salary->potongan) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('potongan') border-red-500 @enderror"
                        required
                    />
                    @error('potongan')
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