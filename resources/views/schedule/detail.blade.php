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
    <h1 class="text-primary font-weight-bold m-4">Detail Jadwal</h1>

    <div class="card m-4">

        <div class="card-header">
            <h2 class="text-primary font-weight-bold">{{ $schedule->day }} - {{ $schedule->shifts }}</h2>
        </div>

        <div class="card-body">
            <p class="text-primary">Jam Masuk : {{ $schedule->time_in }}</p>
            <p class="text-primary">Jam Pulang : {{ $schedule->time_out }}</p>
        </div>
    </div>
    <div class="d-flex justify-content-end mx-3">
        <a href="/schedule" class="btn btn-info px-5 py-2">Kembali</a>
    </div>

    <div class="col-lg-12">
        <div class="card my-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h4 class="mx-2 my-0 text-primary font-weight-bold">Karyawan Dengan Jadwal Ini :</h4>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kode Pegawai</th>
                            <th scope="col">Divisi</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($schedule->employee_schedules as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->profile->employee_code }}</td>
                                <td>{{ $item->positions->division->division_name }}</td>
                                <td>{{ $item->positions->position_name }}</td>
                                <td>
                                    <button class="btn btn-info py-1"><a href="/employee/{{ $item->id }}"
                                            style="text-decoration: none; color:white;">Detail</a></button>
            </td>
            </tr>
        @empty
            @endforelse
            </tbody>
            </table>
        </div>
    </div>

@endsection
