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

    <h1 class="text-primary m-4 strong">Riwayat Daftar Hadir</h1>

    <div class="card m-4">
        <div class="card-header">
            <h3 class="text-primary font-weight-bold"> Tanggal : {{ $attendance->attendance_date }}</h3>
        </div>
        <div class="card-body">
            <h4 class="text-primary mb-3">Jam Masuk : {{ $attendance->time_in }} WIB</h4>
            <h4 class="text-primary mb-3">Jam Pulang : {{ $attendance->time_out }} WIB</h4>
            <h4 class="text-primary mb-3">Keteranagn : </h4>
            @if ($attendance->description != null)
            <h5>{{ $attendance->description }}</h5>
            @else
            <h5>Tidak Ada Keteranagn</h5>
            @endif
        </div>
        <div class="d-flex justify-content-end">
            <a href="/position" class="btn btn-info mx-3 my-3 px-4 py-1">Kembali</a>
        </div>
    </div>


    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h4 class="mx-2 my-0 text-primary font-weight-bold">Karyawan Yang Hadir :</h4>
                <a href="/attendacereportday/{{ $attendance->id }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-print"></i> Export PDF</a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">Kode Pegawai</th>
                            <th scope="col">Jam Masuk</th>
                            <th scope="col">Jam Keluar</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attendance_report as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->profile->employee_code }}</td>
                                <td>{{ $item->employee_in }}</td>
                                <td>{{ $item->employee_out }}</td>
                                <td>{{ $item->status }}</td>
            </tr>
        @empty
            @endforelse
            </tbody>
            </table>
        </div>
    </div>
@endsection
