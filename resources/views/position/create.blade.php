@extends('layouts.master')

@section('navbar')
    @include('part.navbar')
@endsection

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('content')

<h1 class="text-primary mx-4 my-4">Tambah Jabatan</h1>

    <div class="card mx-4 my-4 px-2">

        <form action="/position" method="post">
            @csrf
            <div class="form-group">
                <label class="text-md text-primary font-weight-bold">Nama Jabatan</label>
                <input name="position_name" type="text" class="form-control">
            </div>
            @error('position_name')
                <div class="alert-danger mx-4 my-2 px-2 py-2">{{ $message }}</div>
            @enderror

            <div class="form-group">
            <label for="employee_code" class="text-md text-primary font-weight-bold">Divisi</label>
            <select name="division_id" id="division_id" class="form-control">
            <option value="">Pilih Divisi</option>
            @foreach ($division as $item )
            <option value="{{ $item->id }}">{{ $item->division_name }}</option>
            @endforeach
            </select>
        </div>

        @error('division_id')
        <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror

            <div class="form-group">
            <label for="employee_code" class="text-md text-primary font-weight-bold">Posisi atau Jabatan</label>
            <select name="salary_id" id="salary_id" class="form-control">
            <option value="">Pilih Golongan Gaji</option>
            @foreach ($salary as $item )
            <option value="{{ $item->id }}">Golongan {{ $item->class }} - {{ $item->salary }}</option>
            @endforeach
            </select>
        </div>

        @error('salary_id')
        <div class="alert-danger mx-4 my-2 px-2 py-2"> {{ $message }}</div>
        @enderror

            <div class="form-group">
                <label class="text-md text-primary font-weight-bold" for="exampleFormControlTextarea1">Deskripsi</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="d-flex justify-content-end">
                <a href="/position" class="btn btn-danger px-3 py-2 my-3">Batal</a>
                <button class="btn btn-info px-3 py-2 my-3 mx-2">Tambah</button>
            </div>

        </form>

    </div>

@endsection
