@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')

    <h1 class="text-primary font-weight-bold m-4">Tambah Divisi</h1>

    <div class="card m-4 px-2">

        <form action="/division" method="post">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput" class="text-md text-primary font-weight-bold">Nama Divisi</label>
                <input name="division_name" type="text" class="form-control" id="formGroupExampleInput">
            </div>
            @error('division_name')
                <div class="alert alert-danger mx-4 my-2 px-2 py-2">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="text-md text-primary font-weight-bold">Deskripsi</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="d-flex justify-content-end">
                <a href="/division" class="btn btn-danger px-3 py-2 my-3">Batal</a>
                <button class="btn btn-info px-3 py-2 my-3 mx-2">Tambah</button>
            </div>

        </form>
    </div>
@endsection
