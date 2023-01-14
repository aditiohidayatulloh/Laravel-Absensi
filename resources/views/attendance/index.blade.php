@extends('layouts.master')

@section('navbar')
    @include('part.navbar')
@endsection

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('content')

<h1 class="text-primary font-weight-bold m-4">{{ $time_now }}</h1>

<div class="row mx-2 my-2">

    <div class="col-6">
        <div class="card">
            <div class="card-header">
               <h2 class="text-primary font-weight-bold"> Absen Masuk</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Isi Absensi</a>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header">
               <h2 class="text-danger font-weight-bold"> Absen Keluar</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-danger">Isi Absensi</a>
            </div>
        </div>
    </div>



    </div>

@endsection
