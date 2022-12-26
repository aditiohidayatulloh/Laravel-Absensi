<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use File;
class ProfileController extends Controller
{
    public function index(){
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        return view('profile.index',['profile'=>$profile]);
    }

    public function edit(){
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        return view('profile.edit',['profile'=>$profile]);
    }

    public function update(request $request, $id){
        $request->validate([
            'address'=> 'required',
            'phone_number'=> 'required',
            'profile_picture'=> 'nullable|mimes:jpg,jpeg,png|max:2048'
        ],
        [
            'address.required'=>"address tidak boleh kosong",
            'phone_number.required'=>"Nomor Telepon tidak boleh kosong",
            'profile_picture.mimes' =>"Foto Profile Harus Berupa jpg,jpeg,atau png",
            'profile_picture.max' => "ukuran gambar tidak boleh lebih dari 2048 MB"
        ]);
        $iduser = Auth::id();
        $profile = Profile::where('users_id',$iduser)->first();
        $user = User::where('id',$iduser)->first();

        if($request->has('profile_picture')){
         $path='images/photoProifle';

         File::delete($path.$profile->profile_picture);

         $namaGambar = time().'.'.$request->profile_picture->extension();

         $request->profile_picture->move(public_path('images/profile_picture'),$namaGambar);

         $profile->profile_picture =$namaGambar;

         $profile->save();
        }
        $profile->address = $request->address;
        $profile->phone_number = $request->phone_number;

        $profile->save();
        $user->save();

        // Alert::success('Success', 'Berhasil Mengubah Profile');
        return redirect('/profile');
    }

}
