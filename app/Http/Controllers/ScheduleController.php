<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Position;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = Auth::id();
        $schedule = Schedule::all();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();

        return view('schedule.index',compact('schedule','profile','user_position'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->positions->position_name !== "Administrator"){
            abort(403);
        }
        $iduser = Auth::id();
        $schedule = Schedule::all();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();

        return view('schedule.create',compact('schedule','profile','user_position'));
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
            'shifts'=>'required',
            'day'=>'required',
            'time_in'=>'required',
            'time_out'=>'required',
        ],
        [
            'shifts.required'=>'Masukan Shift Kerja',
            'day.required'=>'Masukan Hari Kerja',
            'time_in.required'=>'Masukan Jam Masuk Kerja',
            'time_out.required'=>'Masukan Jam Keluar Kerja',
        ]
    );
    // dd($request->all());
    $schedule = Schedule::create($request->all());

    Alert::success('Berhasil', 'Berhasil Menambahkan Jadwal Karyawan');
    return redirect('schedule');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $iduser = Auth::id();
        $schedule = Schedule::find($id);
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        $employee = User::all();

        return view('schedule.detail',compact('schedule','profile','user_position','employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->positions->position_name !== "Administrator"){
            abort(403);
        }
        $iduser = Auth::id();
        $schedule = Schedule::find($id)->first();
        $shifts = Schedule::get('shifts');
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        // dd($shifts);
        return view('schedule.edit',compact('schedule','profile','user_position','shifts'));
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
        $request->validate([
            'shifts'=>'required',
            'day'=>'required',
            'time_in'=>'required',
            'time_out'=>'required',
        ],
        [
            'shifts.required'=>'Masukan Shift Kerja',
            'day.required'=>'Masukan Hari Kerja',
            'time_in.required'=>'Masukan Jam Masuk Kerja',
            'time_out.required'=>'Masukan Jam Keluar Kerja',
        ]
    );
    $schedule = Schedule::find($id);
    $schedule->shifts = $request->shifts;
    $schedule->day = $request->day;
    $schedule->time_in = $request->time_in;
    $schedule->time_out = $request->time_out;

    $schedule->save();
    Alert::success('Berhasil', 'Berhasil Mengubah Jadwal Karyawan');
    return redirect('schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule= Schedule::find($id);

        $schedule->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Jadwal');
        return redirect('schedule');
    }
}
