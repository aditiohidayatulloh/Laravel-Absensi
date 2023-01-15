@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')

<h1 class="text-primary font-weight-bold m-4">Tambah Daftar Hadir Karyawan</h1>


<div class="card mx-4 my-4 px-2">

    <form action="/attendance/{{ $attendance->id }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label class="text-md text-primary font-weight-bold">Pilih Tanggal</label>
            <input type="date" name="attendance_date" class="form-control" value="{{ old('attendance_date', $attendance->attendance_date) }}">
        </div>
        @error('attendance_date')
            <div class="alert-danger mx-2 px-2 py-2">{{ $message }}</div>
        @enderror

        <div class="row justify-content-between">
            <div class="col-5 mx-2">
                <label for="time_in" class="text-md text-primary font-weight-bold">Jam Masuk</label>
                <input class="form-control" type="time" name="time_in" value="{{ old('time_in', $attendance->time_in) }}">
                @error('time_in')
                <div class="alert-danger mx-2 px-2 py-2 my-3">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-5 mx-2">
                <label for="time_out" class="text-md text-primary font-weight-bold">Jam Keluar</label>
                <input class="form-control" type="time" name="time_out" value="{{ old('time_out', $attendance->time_out) }}">

                @error('time_out')
                <div class="alert-danger mx-2 px-2 py-2 my-3">{{ $message }}</div>
                @enderror

            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="text-md text-primary font-weight-bold">Deskripsi</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ old('description', $attendance->description) }}</textarea>
        </div>

        <div class="d-flex justify-content-end">
            <a href="/attendance" class="btn btn-danger px-3 py-2 my-3">Batal</a>
            <button class="btn btn-info px-3 py-2 my-3 mx-2">Tambah</button>
        </div>

    </form>

</div>


@endsection

