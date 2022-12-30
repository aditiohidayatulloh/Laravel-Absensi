@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
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
    <div class="mx-3 my-4">
        <h1 class="text-primary">Daftar Pegawai</h1>
        <a href="/employee/create" class="btn btn-info mt-3">Tambah Data Pegawai</a>
        <a href="/cetaklaporan" class="btn btn-info mt-3 mx-2"><i class="fa-solid fa-print"></i> Export PDF</a>
    </div>

    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kode Pegawai</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employee as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->profile->employee_code }}</td>
                                <td>{{ $item->email }}</td>
                                <td>Administrator</td>
                                <td>

                                    <button class="btn btn-info"><a href="/employee/{{ $item->id }}"
                                            style="text-decoration: none; color:white;"><i
                                                class="fa-solid fa-circle-info"></i></a></button>
                                    <button class="btn btn-warning"><a href="/employee/{{ $item->id }}/edit"
                                            style="text-decoration: none;color:white"><i
                                                class="fa-solid fa-pen-to-square"></i></a></button>
                                    <button class="btn btn-danger"><a data-toggle="modal"
                                            data-target="#DeleteModal{{ $item->id }}"><i
                                                class="fa-solid fa-trash"></i></a></button>

                                    <!--Delete Modal -->
                                    <div class="modal fade" id="DeleteModal{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabelDelete" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabelDelete">Ohh No!</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary btn-border"
                                                        data-dismiss="modal">Cancel</button>
                                                    <form action="/employee/{{ $item->id }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="submit" value="Delete"class="btn btn-danger btn-border">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            </div>
            </form>
            </td>
            </tr>
        @empty
            @endforelse
            </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection