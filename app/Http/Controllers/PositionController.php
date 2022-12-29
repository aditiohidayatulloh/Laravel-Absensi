<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Position;
use App\Models\Posisition;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posisition  $posisition
     * @return \Illuminate\Http\Response
     */
    public function show(Posisition $posisition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posisition  $posisition
     * @return \Illuminate\Http\Response
     */
    public function edit(Posisition $posisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posisition  $posisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posisition $posisition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posisition  $posisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posisition $posisition)
    {
        //
    }
}
