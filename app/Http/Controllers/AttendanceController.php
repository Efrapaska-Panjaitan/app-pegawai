<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Attendance::with('employee');
        $employees = Employee::all();
    
        if ($request->has('karyawan_id') && $request->karyawan_id != '') {
            $query->where('karyawan_id', $request->karyawan_id);
        }
    
        if ($request->has('start_date') && $request->start_date != '') {
            $query->whereDate('tanggal', '>=', $request->start_date);
        }
    
        if ($request->has('end_date') && $request->end_date != '') {
            $query->whereDate('tanggal', '<=', $request->end_date);
        }
    
        $attendances = $query->paginate(10);
        return view('attendances.index', compact('attendances', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'karyawan_id'   => 'required|exists:employees,id',
        'tanggal'       => 'required|date',
        'waktu_masuk'   => 'nullable|date_format:H:i',
        'waktu_keluar'  => 'nullable|date_format:H:i',
        'status_absensi'=> 'required|in:hadir,izin,sakit,alpha',
        ]);

        Attendance::create($request->all());
        return redirect()->route('attendances.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attendance = Attendance::with('employee')->findOrFail($id);
        return view('attendances.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::all();
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'karyawan_id'   => 'required|exists:employees,id',
        'tanggal'       => 'required|date',
        'waktu_masuk'   => 'nullable|date_format:H:i',
        'waktu_keluar'  => 'nullable|date_format:H:i',
        'status_absensi'=> 'required|in:hadir,izin,sakit,alpha',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->only([
        'karyawan_id', 'tanggal', 'waktu_masuk', 'waktu_keluar', 'status_absensi'
        ]));

        return redirect()->route('attendances.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return redirect()->route('attendances.index');
    }
}
