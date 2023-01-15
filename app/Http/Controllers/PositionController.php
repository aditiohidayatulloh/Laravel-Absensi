<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Salary;
use App\Models\Profile;
use App\Models\Division;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = Auth::id();
        $position = Position::with('division','salaries')->get();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        return view('position.index',compact('position','profile','user_position'));
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
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        $salary = Salary::all();
        $division = Division::all();
        // dd($salary);
        return view('position.create',compact('profile','user_position','salary','division'));
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
            'position_name' => 'required|min:2',
            'division_id'=>'required',
            'salary_id'=>'required',
            'descrirption' => 'nullable'
        ],
        [
            'position_name.required' => "Nama Posisi Harus Diisi",
            'position_name.min' => "Minimal 2 karakter",
            'division_id.required' => "Divisi Harus Diisi",
            'salary_id.required' => "Golongan Gaji Harus Diisi",
        ]);
        // dd($request->all());

        $position = Position::create($request->all());

        Alert::success('Berhasil', 'Berhasil Menambahkan Jabatan');
        return redirect('/position');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $iduser = Auth::id();
        $position = Position::find($id);
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        $employee = User::where('position_id',$id)->get();
        $salary = Salary::get('salary');

        return view('position.detail',compact('position','profile','user_position','employee','salary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->positions->position_name !== "Administrator"){
            abort(403);
        }
        $iduser = Auth::id();
        $position = Position::find($id);
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        $divisions = Division::where('id','!=',$position->division_id)->get();
        $salary = Salary::where('id', '!=', $position->salary_id)->get();
        // dd($salary);
        return view('position.edit',compact('position','profile','user_position','divisions','salary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'position_name' => 'required|min:2',
            'division_id' => 'required',
            'salary_id' => 'required',
        ],
        [
            'position_name.required' => "Nama Jabatan Harus Diisi",
            'position_name.min' => "Minimal 2 karakter",
            'division_id.required' => "Divisi Harus Diisi",
            'salary_id.required' => "Golongan Gaji Harus Diisi",
        ]);

        $position = Position::find($id);

        $position ->position_name =$request->position_name;
        $position ->division_id =$request->division_id;
        $position ->salary_id =$request->salary_id;
        $position ->description= $request->description;

        $position->save();

        Alert::success('Berhasil', 'Update Success');
        return redirect('/position');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position=Position::find($id);

        $position->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Jabatan');
        return redirect('position');
    }
}
