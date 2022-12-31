<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Position;
use App\Models\Posisition;
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

        return view('position.create',['profile'=>$profile,'user_position'=>$user_position]);
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
        ],
        [
            'position_name.required' => "Nama Posisi Harus Diisi",
            'position_name.min' => "Minimal 2 karakter"
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
        $position = Position::where('id',$id)->first();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();

        return view('position.detail',['position'=>$position,'profile'=>$profile,'user_position'=>$user_position]);
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

        return view('position.edit',['position'=>$position,'profile'=>$profile,'user_position'=>$user_position]);
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
        ],
        [
            'position_name.required' => "Masukkan Nama Jabatan",
            'position_name.min' => "Minimal 2 karakter"
        ]);

        $position =Position::find($id);

        $position ->position_name =$request->position_name;
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

        Alert::success('Berhasil', 'Berhasil Menghapus Kategori');
        return redirect('position');
    }
}
