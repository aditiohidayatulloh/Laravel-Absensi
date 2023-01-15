<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use App\Models\Division;
use App\Models\Position;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\EmployeeAttendance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $iduser = Auth::id();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        $employee_count = User::count();
        $position_count = Position::count();
        $division_count = Division::count();
        $time_now = Carbon::now()->toDateString();
        $employee_attendance = Attendance::where('attendance_date',$time_now)->first();

        if ($employee_attendance == null){
            $employee_attendance_count = 0;
        }
        else{
            $employee_attendance_count = EmployeeAttendance::where('attendance_id',$employee_attendance->id)->count();
        }

        return view('dashboard',compact('profile','user_position','employee_count','position_count','division_count','employee_attendance_count'));
    }
}
