@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')

<h1 class="text-primary font-weight-bold m-4">Absen Masuk Karyawan</h1>

<div class="card mx-4 my-4 px-2">

    <form action="/employeeattendance" method="post">
        @csrf
        <div class="form-group">
            <label class="text-md text-primary font-weight-bold">Keterangan</label>
            <select class="form-control" name="status" id="status">
                <option value="">Pilih Keterangan</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
            </select>
        </div>
        @error('status')
            <div class="alert-danger mx-2 px-2 py-2">{{ $message }}</div>
        @enderror

        <div class="d-flex justify-content-end">
            <a href="/employeeattendance" class="btn btn-danger px-3 py-2 my-3">Batal</a>
            <button class="btn btn-info px-3 py-2 my-3 mx-2">Tambah</button>
        </div>

    </form>

</div>


@endsection
