@extends('layouts.master')

@section('navbar')
    @include('part.navbar')
@endsection

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('content')

    <h1 class="text-primary m-4 strong">Detail Posisi</h1>

    <div class="card m-4">
        <h3 class="judul m-3 text-primary" style="font-weight:bold;">{{ $position->position_name }}</h3>
        @if ($position->description != null)
            <p class="description m-3">{{ $position->description }}</p>
        @else
            <p class="description m-3">Tidak Ada Deskripsi</p>
        @endif
        <div class="d-flex justify-content-end">
            <a href="/position" class="btn btn-info mx-3 my-3 px-4 py-1">Kembali</a>
        </div>
    </div>

    <h4 class="m-4 text-primary" style="font-weight: bold;">Karyawan Dengan Posisi Ini :</h4>

@endsection
