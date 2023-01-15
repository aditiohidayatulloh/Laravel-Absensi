<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Profile;
use App\Models\Position;
use App\Models\Schedule;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\EmployeeAttendance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeAttendanceController extends Controller
{
    public function index()
    {
        $iduser = Auth::id();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        $time_local = Carbon::now()->locale('id')->isoFormat('LLLL');
        $date_now = Carbon::now()->toDateString();
        $time_now = Carbon::now()->toTimeString();
        $attendance = Attendance::where('attendance_date',$date_now)->first();
        $employeeattendance = EmployeeAttendance::where('users_id',$iduser)->first();
        // dd($employeeattendance);
        return view('employeeAttendance.index',compact('profile','user_position','time_local','time_now','attendance','employeeattendance'));
    }

    public function create()
    {
        $iduser = Auth::id();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        $date_now = Carbon::now()->toDateString();
        $time_now = Carbon::now()->toTimeString();
        $attendance_date = Attendance::where('attendance_date',$date_now)->first();
        $employee_attendance = EmployeeAttendance::where('attendance_id',$attendance_date->id)->get();
        $p = EmployeeAttendance::where('users_id',$iduser)->first('employee_in');
        // dd($p);

        if ($attendance_date->time_in <= $time_now && $attendance_date->time_out <= $time_now){
            Alert::warning('Oops', 'Absen Tidak Tersedia Saat Ini');
            return redirect('employeeattendance');
        }
        else if ($p != null) {
            Alert::warning('Oops', 'Absen Telah Berhasil Absen Masuk Untuk Hari Ini, Silahkan Absen Keluar');
            return redirect('employeeattendance');
        }
        return view('employeeAttendance.create',compact('profile','user_position','time_now','attendance_date'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' =>'required',
            'employee_out'=>'nullable'
        ],
        [
            'status.required'=>'Masukan Keterangan',
        ]
    );
    $date_now = Carbon::now()->toDateString();
    $attendance = Attendance::where('attendance_date',$date_now)->first('id');
    $request['users_id'] = Auth::user()->id;
    $request['attendance_id'] = $attendance->id;
    $request['employee_in'] = Carbon::now()->toTimeString();
    // dd($request->all());

    $employeeattendance = EmployeeAttendance::create($request->all());

    Alert::success('Berhasil', 'Berhasil Mengisi Absen Masuk');
    return redirect('/employeeattendance/report');
    }

    public function attendanceReport(){
        $iduser = Auth::id();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        $attendance = EmployeeAttendance::with('user','attendance')->get();
        $employeeattendance = EmployeeAttendance::where('users_id',$iduser)->get();
        return view('employeeAttendance.report',compact('profile','user_position','employeeattendance'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $iduser = Auth::id();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        $date_now = Carbon::now()->toDateString();
        $time_now = Carbon::now()->toTimeString();
        $attendance = Attendance::where('attendance_date',$date_now)->first('time_out');
        $employeeattendance = EmployeeAttendance::where('users_id',$iduser)->first();
        // dd($employeeattendance);
        if ($attendance->time_out > $time_now){
            Alert::warning('Oops', 'Absen Tidak Tersedia Saat Ini');
            return redirect('employeeattendance');
        }
        else if ($employeeattendance->employee_out != null) {
            Alert::warning('Oops', 'Anda Telah Mengisi Absen Keluar Untuk Hari Ini');
            return redirect('employeeattendance');
        }
        return view('employeeAttendance.edit',compact('profile','user_position','time_now','attendance','employeeattendance'));
    }

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $employee_attendance = EmployeeAttendance::find($id);
    $employee_attendance->employee_out = Carbon::now()->toTimeString();
    // dd($request->all());
    $employee_attendance->save();
    Alert::success('Berhasil', 'Berhasil Mengubah Daftar Hadir Karyawan');
    return redirect('/employeeattendance/report');
    }

}
