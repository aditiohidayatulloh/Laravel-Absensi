<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Salary;
use App\Models\Division;
use App\Models\Position;
use App\Models\Schedule;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\EmployeeAttendance;
use App\Http\Controllers\Controller;

class PDFController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function EmployeeReport(Request $request){
        $employee = User::with('profile','positions')->get();

        // dd($employee);
        $pdf = PDF::loadView('PDFReport.employee_report',['employee'=>$employee]);

        // return $pdf->download('employee_report.pdf');
        return $pdf->stream('employee_report.pdf');
    }

    public function SalaryReport(Request $request){
        $salary = Salary::all();

        $pdf = PDF::loadView('PDFReport.salary_report',['salary'=>$salary]);

        // return $pdf->download('salary_report.pdf');
        return $pdf->stream('salary_report.pdf');
    }

    public function DivisionReport(Request $request){
        $division = Division::all();

        $pdf = PDF::loadView('PDFReport.division_report',['division'=>$division]);

        // return $pdf->download('division_report.pdf');
        return $pdf->stream('division_report.pdf');
    }

    public function PositionReport(Request $request){
        $position = Position::with('salaries','division')->get();

        $pdf = PDF::loadView('PDFReport.position_report',['position'=>$position]);

        // return $pdf->download('position_report.pdf');
        return $pdf->stream('position_report.pdf');
    }

    public function ScheduleReport(Request $request){
        $schedule = Schedule::all();

        $pdf = PDF::loadView('PDFReport.schedule_report',['schedule'=>$schedule]);

        // return $pdf->download('Schedule_report.pdf');
        return $pdf->stream('schedule_report.pdf');
    }

    public function AttendanceReportDay($id){
        $attendance = Attendance::find($id);
        $attendance_report = EmployeeAttendance::where('attendance_id',$id)->with('user','attendance')->get();

        $pdf = PDF::loadView('PDFReport.attendance_report_day',['attendance'=>$attendance,'attendance_report'=>$attendance_report]);

        // return $pdf->download('Schedule_report.pdf');
        return $pdf->stream('attendance__report_day.pdf');
    }

}
