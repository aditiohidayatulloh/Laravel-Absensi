@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')


<div class="card mx-4 my-4 px-2">
    <h1 class="text-primary font-weight-bold m-4">Absen Keluar Karyawan</h1>
<form action="/employeeattendance/{{ $employeeattendance->id }}" method="POST">
        @csrf
        @method('put')
        <div class="d-flex justify-content-center container-fluid">
            <button class="btn btn-danger px-3 py-2 my-3 mx-2" style="width:100%" >Absen Keluar</button>
        </div>
    </form>

</div>


@endsection
