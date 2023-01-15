@extends('layouts.master')

@section('navbar')
    @include('part.navbar')
@endsection

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('content')

<h1 class="text-primary font-weight-bold m-4">{{ $time_local }}</h1>

@if ($attendance == null)
<h1 class="text-primary font-weight-bold m-4">Belum Ada Absen Untuk Saat Ini</h1>
@else
<div class="row mx-2 my-2">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
               <h2 class="text-primary font-weight-bold"> Absen Masuk</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Absen Masuk Tanggal {{ $attendance->attendance_date }}</h5>
                <p class="card-text">Tersedia Dari Jam {{ $attendance->time_in }} sampai {{ $attendance->time_out }}</p>
                <a href="/employeeattendance/create" class="btn btn-primary">Isi Absensi</a>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-header">
               <h2 class="text-danger font-weight-bold"> Absen Keluar</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Absen Keluar Tanggal {{ $attendance->attendance_date }}</h5>
                <p class="card-text">Tersedia Mulai Dari Jam {{ $attendance->time_out }}</p>
                @if($employeeattendance != null)
                <a href="/employeeattendance/{{ $employeeattendance->id }}/edit" class="btn btn-danger">Isi Absensi</a>
                @else
                <button type="button" class="btn btn-danger" disabled>Absen Keluar</button
                @endif
            </div>
        </div>
    </div>
    </div>
@endif





@endsection
