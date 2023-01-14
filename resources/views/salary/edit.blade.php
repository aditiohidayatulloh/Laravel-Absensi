@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')

    <h1 class="text-primary font-weight-bold m-4">Edit Golongan Gaji</h1>

    <div class="card mx-4 my-4 px-2">

        <form action="/salary/{{ $salary->id }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="text-md text-primary font-weight-bold">Golongan</label>
                <input name="class" type="text" value="{{ old('class', $salary->class) }}" class="form-control">
            </div>
            @error('class')
                <div class="alert-danger mx-2 px-2 py-2">{{ $message }}</div>
            @enderror


            <div class="form-group">
                <label class="text-md text-primary font-weight-bold">Jumlah Gaji (Rupiah)</label>
                <input name="salary" type="text" value="{{ old('salary', $salary->salary) }}" class="form-control">
            </div>

            @error('salary')
                <div class="alert-danger mx-2 px-2 py-2">{{ $message }}</div>
            @enderror

            <div class="d-flex justify-content-end">
                <a href="/salary" class="btn btn-danger px-3 py-2 my-3">Batal</a>
                <button class="btn btn-info px-3 py-2 my-3 mx-2">Tambah</button>
            </div>
        </form>

    </div>

@endsection
