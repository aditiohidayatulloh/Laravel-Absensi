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
        $position = Position::all();
        $division = Division::all();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();

        return view('position.index',['position'=>$position,'profile'=>$profile,'user_position'=>$user_position]);
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
        $salary = Salary::all();
        $division = Division::all();
        // dd($salary);
        return view('position.create',['profile'=>$profile,'user_position'=>$user_position,'salary'=>$salary,'division'=>$division]);
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
        $salary = Salary::all();

        return view('position.detail',['position'=>$position,'profile'=>$profile,'user_position'=>$user_position,'employee'=>$employee,'salary'=>$salary]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iduser = Auth::id();
        $position = Position::where('id',$id)->first();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        $division = Division::all();
        $salary = Salary::all();
        return view('position.edit',['position'=>$position,'profile'=>$profile,'user_position'=>$user_position,'salary'=>$salary,'division'=>$division]);
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
        $position ->divison_id =$request->divison_id;
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
