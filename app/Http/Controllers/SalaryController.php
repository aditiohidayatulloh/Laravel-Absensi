<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Profile;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = Auth::id();
        $salary = Salary::all();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();

        return view('salary.index',['salary'=>$salary,'profile'=>$profile,'user_position'=>$user_position]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser = Auth::id();
        $salary = Salary::all();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();

        return view('salary.create',['salary'=>$salary,'profile'=>$profile,'user_position'=>$user_position]);
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
            'class'=>'required',
            'salary'=>'required'
        ],
        [
            'class.required'=>"Masukan Golongan Gaji",
            'salary'=>"Masukan Jumlah Gaji"
        ]);
        $salary = Salary::create($request->all());

        Alert::success('Berhasil', 'Berhasil Menambahkan Golongan Gaji');
        return redirect('/salary');
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
        $salary = Salary::where('id',$id)->first();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        $position_salary = Position::where('salary_id',$id)->get();

        return view('salary.detail',['salary'=>$salary,'profile'=>$profile,'user_position'=>$user_position,'position_salary'=>$position_salary]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iduser = Auth::id();
        $salary = Salary::where('id',$id)->first();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();

        return view('salary.edit',['salary'=>$salary,'profile'=>$profile,'user_position'=>$user_position]);
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
            'class'=>'required',
            'salary'=>'required'
        ],
        [
            'class.required'=>"Masukan Golongan Gaji",
            'salary'=>"Masukan Jumlah Gaji"
        ]);

        $salary = Salary::find($id);
        $salary->class =$request->class;
        $salary->salary =$request->salary;

        $salary->save();

        Alert::success('Berhasil', 'Berhasil Update Golongan Gaji');
        return redirect('/salary');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salary= Salary::find($id);

        $salary->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Gaji');
        return redirect('salary');
    }
}
