@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')
<h1 class="text-primary mx-3 my-3">Form Edit Pegawai</h1>
<form action="/employee" method="post">
    @csrf

    <div class="card pb-5 mx-3">
        <div class="form-group mx-4">
            <label for="name" class="text-md text-primary font-weight-bold mt-2">Nama Lengkap</label>
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{  old('name', $profile->user->name)  }}">
        </div>

        @error('name')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="employee_code" class="text-md text-primary font-weight-bold">Nomor Pegawai</label>
            <input type="text" id="npm" class="form-control @error('npm') is-invalid @enderror" name="employee_code" value="{{ old('npm', $profile->employee_code) }}">
        </div>

        @error('npm')
        <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="nama" class="text-md text-primary font-weight-bold">Jenis Kelamin</label>
            <input type="text" id="prodi" class="form-control @error('prodi') is-invalid @enderror" name="prodi" value="{{old('prodi', $profile->gender)}}">
        </div>

        @error('prodi')
            <div class="alert-danger mx-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="nama" class="text-md text-primary font-weight-bold">Alamat</label>
            <input type="text" id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $profile->address) }}">
        </div>

        @error('alamat')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="nama" class="text-md text-primary font-weight-bold">Nomor Telepon</label>
            <input type="text" id="alamat" class="form-control @error('noTelp') is-invalid @enderror" name="noTelp" value="{{ old('noTelp', $profile->phone_number)}}">
        </div>

        @error('noTelp')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="button-save d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mt-4 mx-4 px-5 py-1">Simpan</button>
        </form>
        </div>
    </div>
@endsection
