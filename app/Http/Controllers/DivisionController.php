<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Division;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        $user_level = Auth::user()->position_id;
        $user_position = Position::where('id',$user_level)->first();
        $division = Division::all();
        return view('division.index',compact('profile','user_position','division'));
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
        $profile = Profile::where('users_id',$iduser)->first();
        $user_level = Auth::user()->position_id;
        $user_position = Position::where('id',$user_level)->first();
        return view('division.create',compact('profile','user_position'));
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
            'division_name'=>'required',
        ],
        [
            'division_name.required'=>"Nama Divisi Harus Disisi",
        ]);
        $division = Division::create($request->all());
        Alert::success('Berhasil', 'Berhasil Menambahkan Divisi');
        return redirect('/division');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $division = Division::find($id);
        $position = Position::where('division_id',$id)->get();
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        $user_level = Auth::user()->position_id;
        $user_position = Position::where('id',$user_level)->first();
        return view('division.detail',compact('profile','user_position','division','position'));
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
        $division = Division::find($id);
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        $user_level = Auth::user()->position_id;
        $user_position = Position::where('id',$user_level)->first();
        return view('division.edit',compact('profile','user_position','division'));
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
            'division_name'=>'required',
        ],
        [
            'division_name.required'=>"Nama Divisi Harus Disisi",
        ]);
        $division = Division::find($id);

        $division->division_name = $request->division_name;
        $division->description = $request->description;

        $division->save();

        Alert::success('Berhasil', 'Berhasil Update Divisi');
        return redirect('/division');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $division=Division::find($id);

        $division->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Jabatan');
        return redirect('division');
    }
}
