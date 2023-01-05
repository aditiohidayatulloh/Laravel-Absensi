@extends('layouts.master')

@section('navbar')
    @include('part.navbar')
@endsection

@section('sidebar')
    @include('part.sidebar')
@endsection

@push('styles')
<link rel="stylesheet" type="text/css"
href="https://cdn.datatables.net/v/bs4/dt-1.12.1/date-1.1.2/fc-4.1.0/r-2.3.0/sc-2.0.7/datatables.min.css" />
@endpush


@push('scripts')
<script src="{{ '/template/vendor/datatables/jquery.dataTables.min.js' }}"></script>
<script src="{{ '/template/vendor/datatables/dataTables.bootstrap4.min.js' }}"></script>

<!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
        </script>
@endpush

@section('content')
<h1 class="text-primary m-4">Profile Karywan</h1>
<div class="card m-4">
        <div class="row d-flex" style="gap:3rem">
            <div class="col-2 ml-5 my-4">
                @if ($profile->profile_picture !=null)
                <img src="{{ asset('/images/profile_picture/' . $profile->profile_picture) }}"
                        style="width:150px;height:150px;border-radius:100px">
                @else
                <img src="{{ asset('template/img/boy.jpg') }}" style="width:100px;height:100px;border-radius:50px">
                @endif
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="nama" class="text-lg text-primary font-weight-bold">Nama Lengkap</label>
                    <h4>{{ $profile->user->name }}</h4>
                </div>

                <div class="form-group">
                    <label for="position_name" class="text-lg text-primary font-weight-bold">Divisi</label>
                    <h4>{{ $employee->positions->division->division_name }}</h4>
                </div>


                <div class="form-group">
                    <label for="position_name" class="text-lg text-primary font-weight-bold">Posisi</label>
                    <h4>{{ $employee->positions->position_name }}</h4>
                </div>

                <div class="form-group">
                    <label for="npm" class="text-lg text-primary font-weight-bold">Nomor Pegawai</label>
                    <h4>{{ $profile->employee_code }}</h4>
                </div>

                <div class="form-group">
                    <label for="prodi" class="text-lg text-primary font-weight-bold">Jenis Kelamin</label>
                    <h4>{{ $profile->gender }}</h4>
                </div>

                <div class="form-group">
                    <label for="prodi" class="text-lg text-primary font-weight-bold">Alamat</label>
                    <h4>{{ $profile->address }}</h4>
                </div>

                <div class="form-group">
                    <label for="prodi" class="text-lg text-primary font-weight-bold">Email</label>
                    <h4>{{ $profile->user->email }}</h4>
                </div>

                <div class="form-group mb-3">
                    <label for="prodi" class="text-lg text-primary font-weight-bold">Nomor Telephone</label>
                    <h4>{{ $profile->phone_number }}</h4>
                </div>

            </div>
        </div>
        <div class="edit d-flex justify-content-end my-4 mx-4">
            <a href="/employee" class="btn btn-primary px-5">Kembali</a>
        </div>
    </div>
    </div>
@endsection
