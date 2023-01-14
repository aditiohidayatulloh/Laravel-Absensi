@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')

<h1 class="text-primary font-weight-bold m-4">Edit Jadwal Karyawan</h1>

<div class="card mx-4 my-4 px-2">

    <form action="/schedule/{{ $schedule->id }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label class="text-md text-primary font-weight-bold">Shift</label>
            <select class="form-control" name="shifts" id="shifts">
                <option value="Pilih Shift">Pilih Shift</option>
                <option value="Pagi">Pagi</option>
                <option value="Sore">Sore</option>
                <option value="Malam">Malam</option>
            </select>
        </div>
        @error('shifts')
            <div class="alert-danger mx-2 px-2 py-2">{{ $message }}</div>
        @enderror


        <div class="form-group">
            <label class="text-md text-primary font-weight-bold">Hari</label>
            <select class="form-control" name="day" id="day">
                <option value="">Pilih Hari</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jum'at">Jum'at</option>
            </select>
        </div>

        @error('day')
            <div class="alert-danger mx-2 px-2 py-2 mb-2">{{ $message }}</div>
        @enderror

        <div class="row justify-content-between">
            <div class="col-5 mx-2">
                <label for="time_in" class="text-md text-primary font-weight-bold">Jam Masuk</label>
                <input class="form-control" type="time" name="time_in" value="{{ old('time_in', $schedule->time_in) }}">
                @error('time_in')
                <div class="alert-danger mx-2 px-2 py-2 my-3">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-5 mx-2">
                <label for="time_out" class="text-md text-primary font-weight-bold">Jam Keluar</label>
                <input class="form-control" type="time" name="time_out" value="{{ old('time_in', $schedule->time_out) }}">
                @error('time_out')
                <div class="alert-danger mx-2 px-2 py-2 my-3">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <a href="/schedule" class="btn btn-danger px-3 py-2 my-3">Batal</a>
            <button class="btn btn-info px-3 py-2 my-3 mx-2">Tambah</button>
        </div>
    </form>
</div>


@endsection
