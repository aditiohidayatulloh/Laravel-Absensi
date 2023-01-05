@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')

    <h1 class="text-primary font-weight-bold m-4">Edit Divisi</h1>

    <div class="card m-4 px-2">

        <form action="/division/{{ $division->id }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="formGroupExampleInput" class="text-md text-primary font-weight-bold">Nama Divisi</label>
                <input name="division_name" type="text" value="{{ old('division_name', $division->division_name) }}" class="form-control" id="formGroupExampleInput">
            </div>
            @error('division_name')
                <div class="alert alert-danger mx-4 my-2 px-2 py-2">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="text-md text-primary font-weight-bold">Deskripsi</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ old('description', $division->description) }}</textarea>
            </div>

            <div class="d-flex justify-content-end">
                <a href="/division" class="btn btn-danger px-3 py-2 my-3">Batal</a>
                <button class="btn btn-info px-3 py-2 my-3 mx-2">Tambah</button>
            </div>

        </form>
    </div>
@endsection
