<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Profile;
use App\Models\Position;
use App\Models\Schedule;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = Auth::id();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        $time_now = Carbon::now()->locale('id')->isoFormat('LLLL');
        // $day = Carbon::now()->locale('id')->dayName;
        // $time = Carbon::now()->toTimeString();
        // $schedule_date= Schedule::where('day',$day)->first('day');

        // dd($day);

        return view('attendance.index',compact('profile','user_position','time_now'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser = Auth::id();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        $schedule = Schedule::all();

        return view('attendance.create',compact('profile','user_position','schedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'attendance_date'=>'required',
            'time_in'=>'required',
            'time_out'=>'required',
        ],
        [
            'attendance_date.required'=>'Tanggal Harus Diisi',
            'time_in.required'=>'Masukan Jam Masuk Kerja',
            'time_out.required'=>'Masukan Jam Keluar Kerja',
        ]
    );
    // dd($request->all());
    $schedule = Attendance::create($request->all());

    Alert::success('Berhasil', 'Berhasil Menambahkan Daftar Hadir Karyawan');
    return redirect('attendance');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
