@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')
<h1 class="text-primary mx-3 my-3">Form Edit Pegawai</h1>
<div class="card pb-5 mx-3">
        <form action="/employee/{{ $employee->id }}" method="post">
            @csrf
            @method('put')
        <div class="form-group mx-4">
            <label for="name" class="text-md text-primary font-weight-bold mt-2">Nama Lengkap</label>
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{  old('name', $profile->user->name)  }}">
        </div>

        @error('name')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="employee_code" class="text-md text-primary font-weight-bold">Nomor Pegawai</label>
            <input type="text" id="employee_code" class="form-control @error('employee_code') is-invalid @enderror" name="employee_code" value="{{ old('employee_code', $profile->employee_code) }}">
        </div>

        @error('employee_code')
        <div class="alert-danger mx-4 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="employee_code" class="text-md text-primary font-weight-bold">Posisi atau Jabatan</label>
            <select name="position" id="position" class="form-control">
            <option value="">Pilih Jabatan</option>
            @foreach ($position as $item )
            <option value="{{ $item->id }}">{{ $item->position_name }}</option>
            @endforeach

            </select>
        </div>

        @error('position')
        <div class="alert-danger mx-4 px-2 py-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="gender" class="text-md text-primary font-weight-bold">Jenis Kelamin</label>
            <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        @error('gender')
            <div class="alert-danger mx-4 px-2 py-2 mx-2"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="address" class="text-md text-primary font-weight-bold">Alamat</label>
            <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $profile->address) }}">
        </div>

        @error('address')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4">
            <label for="phone_number" class="text-md text-primary font-weight-bold">Nomor Telepon</label>
            <input type="text" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', $profile->phone_number)}}">
        </div>

        @error('phone_number')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="button-save d-flex justify-content-end">
            <a href="/employee" class="btn btn-danger mt-4  px-4 py-1">Batal</a>
            <button type="submit" class="btn btn-primary mt-4 mx-2 px-5 py-1">Simpan</button>
        </div>
    </form>
    </div>
@endsection
