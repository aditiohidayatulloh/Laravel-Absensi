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

        <div class="card mx-3 my-2">
            <div class="form-group mx-4">
                <label for="nama" class="text-md text-primary font-weight-bold mt-2">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $profile->user->name) }}">
            </div>

            @error('name')
                <div class="alert-danger"> {{ $message }}</div>
            @enderror

            <div class="form-group mx-4">
                <label for="npm" class="text-md text-primary font-weight-bold">Nomor Pegawai</label>
                <input type="text" name="npm" class="form-control" value="{{ old('npm', $profile->employee_code) }}">
            </div>

            @error('npm')
                <div class="alert-danger"> {{ $message }}</div>
            @enderror

            <div class="form-group mx-4">
                <label for="nama" class="text-md text-primary font-weight-bold">Jenis Kelamin</label>
                <input type="text" name="prodi"class="form-control" value="{{ old('prodi', $profile->gender) }}">
            </div>

            @error('prodi')
                <div class="alert-danger mx-2"> {{ $message }}</div>
            @enderror

            <div class="form-group mx-4">
                <label for="nama" class="text-md text-primary font-weight-bold">Alamat</label>
                <input type="text" name="alamat"class="form-control" value="{{ old('alamat', $profile->address) }}">
            </div>

            @error('alamat')
                <div class="alert-danger"> {{ $message }}</div>
            @enderror

            <div class="form-group mx-4">
                <label for="nama" class="text-md text-primary font-weight-bold">Nomor Telepon</label>
                <input type="text" name="noTelp" class="form-control" value="{{ old('noTelp', $profile->phone_number) }}">
            </div>

            @error('noTelp')
                <div class="alert-danger"> {{ $message }}</div>
            @enderror

            <div class="form-group mx-4">
                <label for="photoProfile" class="text-md text-primary font-weight-bold">Tambah Photo Profile</label>
                <div class="custom-file">
                    <input type="file" name="photoProfile" id="photoProfile"
                        value="{{ old('photoProfile', $profile->photoProfile) }}">
                </div>
            </div>

            @error('photoProfile')
                <div class="alert-danger"> {{ $message }}</div>
            @enderror

            <div class="button-save d-flex justify-content-end">
                <a href="/profile" class="btn btn-danger mt-4 py-1 px-4">Batal</a>
                <button type="submit"class="btn btn-primary mt-4 mx-2 px-5 py-1">Simpan</button>
    </form>
    </div>
    </div>
@endsection
