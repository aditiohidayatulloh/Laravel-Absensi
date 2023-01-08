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
            <p class="text-primary">Jam Masuk : {{ $schedule->time_out }}</p>
        </div>
    </div>
    <div class="d-flex justify-content-end mx-3">
        <a href="/schedule" class="btn btn-info px-5 py-2">Kembali</a>
    </div>
@endsection
