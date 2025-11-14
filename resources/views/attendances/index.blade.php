@extends('layouts.app')

@section('title', 'Attendances - App Pegawai')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Attendance Records</h2>
        <a href="{{ route('attendances.create') }}" class="flex items-center space-x-2 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition shadow-md">
            <i class="fas fa-plus"></i>
            <span>Record Attendance</span>
        </a>
    </div>

    <!-- Filter Section -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <form action="{{ route('attendances.index') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Karyawan:</label>
                    <select name="karyawan_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua Karyawan</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" {{ request('karyawan_id') == $emp->id ? 'selected' : '' }}>
                                {{ $emp->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Dari Tanggal:</label>
                    <input
                        type="date"
                        name="start_date"
                        value="{{ request('start_date') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sampai Tanggal:</label>
                    <input
                        type="date"
                        name="end_date"
                        value="{{ request('end_date') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
            </div>
            <div class="mt-4 flex justify-end space-x-2">
                <a href="{{ route('attendances.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Reset</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Filter</button>
            </div>
        </form>
    </div>

    @if($attendances->count() > 0)
        <!-- Attendances Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Karyawan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Masuk</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Keluar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($attendances as $attendance)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $attendance->employee->nama_lengkap }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d/m/Y') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $attendance->waktu_masuk }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $attendance->waktu_keluar ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($attendance->status_absensi == 'Hadir') bg-green-100 text-green-800
                                @elseif($attendance->status_absensi == 'Sakit') bg-yellow-100 text-yellow-800
                                @elseif($attendance->status_absensi == 'Izin') bg-blue-100 text-blue-800
                                @else bg-red-100 text-red-800
                                @endif">
                                {{ $attendance->status_absensi }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('attendances.edit', $attendance->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $attendances->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-lg shadow-md p-12 text-center">
            <i class="fas fa-calendar text-gray-300 text-6xl mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">No Attendance Records</h3>
            <p class="text-gray-500 mb-6">Start recording employee attendance</p>
            <a href="{{ route('attendances.create') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Record First Attendance
            </a>
        </div>
    @endif
</div>
@endsection