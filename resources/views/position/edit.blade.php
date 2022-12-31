@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')

    <h1 class="strong text-primary m-4">Edit Jabatan</h1>
    <div class="card m-4 p-3">
        <form action="/position/{{ $position->id }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="formGroupExampleInput" class="text-primary font-weight-bold">Nama Jabatan</label>
                <input name="position_name" type="text" value="{{ old('position_name', $position->position_name) }}" class="form-control"
                    id="formGroupExampleInput">
            </div>
            @error('position_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label class="text-primary font-weight-bold">Deskripsi</label>
                <textarea class="form-control" name="description" cols="30" rows="3">{{ old('description', $position->description) }}</textarea>

                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="d-flex justify-content-end">
                <a href="/position" class="btn btn-danger mx-2 px-3">Batal</a>
                <button class="btn btn-info px-4">Simpan</button>
            </div>
        </form>
    </div>
@endsection
