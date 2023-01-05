<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\File\File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = Auth::id();
        $employee = User::all();
        $division = Division::all();
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        return view('employee.index',['employee'=>$employee,'profile'=>$profile,'user_position'=>$user_position]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        $user_level = Auth::user()->position_id;
        $user_position = Position::where('id',$user_level)->first();
        $position = Position::all();
        return view('employee.create',['profile'=>$profile,'user_position'=>$user_position,'position'=>$position]);
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
            'name'=> 'required',
            'employee_code'=> 'required|unique:profile',
            'position'=> 'required',
            'gender'=> 'required',
            'address'=> 'required',
            'phone_number'=> 'required',
            'email'=>'required|unique:users',
            'password'=>'|min:8',
        ],
        [
            'name.required'=>"Nama tidak boleh kosong",
            'employee_code.required'=>"Nomor Induk tidak boleh kosong",
            'employee_code.unique'=>"Kode Telah Telah Ada",
            'position.required'=>"Posisi Tidak Boleh Kosong",
            'gender.required'=>"Posisi tidak boleh kosong",
            'gender.required'=>"gender tidak boleh kosong",
            'address.required'=>"address tidak boleh kosong",
            'phone_number.required'=>"Nomor Telepon tidak boleh kosong",
            'email.required'=>"Email tidak boleh kosong",
            'email.unique'=>"Email Telah Digunakan",
            'password.min'=>"Password tidak boleh kurang dari 8 karakter"
        ]);

        // dd($request->all());
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'position_id'=>$request['position']
        ]);

        Profile::create([
            'employee_code'=>$request['employee_code'],
            'gender'=>$request['gender'],
            'address'=>$request['address'],
            'phone_number'=>$request['phone_number'],
            'users_id'=>$user->id,
        ]);

        Alert::success('Success', 'Berhasil Menambah Karyawan');
        return redirect('/employee');
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
        $employee = User::find($id);
        $user_level = Auth::user()->position_id;
        $profile = Profile::where('users_id',$iduser)->first();
        $user_position = Position::where('id',$user_level)->first();
        $position = Position::all();
        $division = Division::all();
        return view('employee.detail',['profile'=>$profile,'user_position'=>$user_position,'position'=>$position,'employee'=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::find($id);
        $profile = Profile::where('users_id',$id)->first();
        $user_level = Auth::user()->position_id;
        $user_position = Position::where('id',$user_level)->first();
        $position = Position::all();
        return view('employee.edit',['employee'=>$employee,'profile'=>$profile,'user_position'=>$user_position,'position'=>$position]);
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
            'name'=> 'required',
            'employee_code'=> 'required',
            'position'=> 'required',
            'gender'=> 'required',
            'address'=> 'required',
            'phone_number'=> 'required',
            'profile_picture'=> 'nullable|mimes:jpg,jpeg,png|max:2048'
        ],
        [
            'name.required'=>"Nama tidak boleh kosong",
            'position.required'=>"Posisi tidak boleh kosong",
            'employee_code.required'=>"Nomor Induk tidak boleh kosong",
            'gender.required'=>"gender tidak boleh kosong",
            'address.required'=>"address tidak boleh kosong",
            'phone_number.required'=>"Nomor Telepon tidak boleh kosong",
            'profile_picture.mimes' =>"Foto Profile Harus Berupa jpg,jpeg,atau png",
            'profile_picture.max' => "ukuran gambar tidak boleh lebih dari 2048 MB"
        ]);

        $user = User::find($id);
        $profile = Profile::find($id);

        $user->name = $request->name;
        $user->position_id = $request->position;
        $profile->employee_code = $request->employee_code;
        $profile->gender = $request->gender;
        $profile->address = $request->address;
        $profile->phone_number = $request->phone_number;

        // dd($request->all());
        $profile->save();
        $user->save();

        Alert::success('Success', 'Berhasil Mengubah Profile');
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        Alert::success('Berhasil', 'Berhasil Mengapus Karyawan');
        return redirect('/employee');
    }
}
