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

    <h1 class="text-primary font-weight-bold m-4">Golongan {{ $salary->class }}</h1>

    <div class="col-auto">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                    <h3 class="text-primary font-weight-bold mx-3 my-2">Jabatan Dengan Gaji Golongan {{ $salary->class }}</h3>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Jabatan</th>
                                <th scope="col">Tombol Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($position_salary as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $item->position_name }}</td>
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
                                                            <input type="submit"
                                                                value="Delete"class="btn btn-danger btn-border">
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
    <div class="d-flex justify-content-end mx-3">
        <a href="/salary" class="btn btn-info px-5 py-2">Kembali</a>
    </div>

@endsection