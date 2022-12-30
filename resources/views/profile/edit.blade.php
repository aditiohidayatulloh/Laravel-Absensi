@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection



@section('content')
<h1 class="text-primary mx-3 my-3">Edit Profile</h1>
    <form action="/profile/{{$profile->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="card mx-3 my-4 py-2">
            <div class="form-group mx-4">
                <label for="nama" class="text-md text-primary font-weight-bold mt-2">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $profile->user->name) }}" disabled>
            </div>

            <div class="form-group mx-4">
                <label for="nama" class="text-md text-primary font-weight-bold mt-2">Posisi</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user_position->position_name) }}" disabled>
            </div>

            <div class="form-group mx-4">
                <label for="npm" class="text-md text-primary font-weight-bold">Nomor Pegawai</label>
                <input type="text" name="npm" class="form-control" value="{{ old('npm', $profile->employee_code) }}" disabled>
            </div>

            <div class="form-group mx-4">
                <label for="nama" class="text-md text-primary font-weight-bold">Jenis Kelamin</label>
                <input type="text" name="prodi"class="form-control" value="{{ old('prodi', $profile->gender) }}" disabled>
            </div>


            <div class="form-group mx-4">
                <label for="nama" class="text-md text-primary font-weight-bold">Alamat</label>
                <input type="text" name="address"class="form-control" value="{{ old('address', $profile->address) }}">
            </div>

            @error('address')
                <div class="alert-danger mx-4 py-2"> {{ $message }}</div>
            @enderror

            <div class="form-group mx-4">
                <label for="nama" class="text-md text-primary font-weight-bold">Nomor Telepon</label>
                <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $profile->phone_number) }}">
            </div>

            @error('phone_number')
                <div class="alert-danger mx-2 py-2"> {{ $message }}</div>
            @enderror

            <div class="form-group mx-4">
                <label for="profile_picture" class="text-md text-primary font-weight-bold">Tambah Photo Profile</label>
                <div class="custom-file">
                    <input type="file" name="profile_picture" id="profile_picture"
                        value="{{ old('profile_picture', $profile->profile_picture) }}">
                </div>
            </div>

            @error('profile_picture')
                <div class="alert-danger"> {{ $message }}</div>
            @enderror

            <div class="button-save d-flex justify-content-end">
                <a href="/profile" class="btn btn-danger mt-4 py-1 px-4">Batal</a>
                <button type="submit"class="btn btn-primary mt-4 mx-2 px-5 py-1">Simpan</button>
    </form>
    </div>
    </div>
@endsection
