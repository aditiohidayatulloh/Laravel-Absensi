@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('navbar')
    @include('part.navbar')
@endsection

@section('content')

    <h1 class="text-primary font-weight-bold m-4">Detail Divisi</h1>

    <div class="card m-4">
        <div class="card-header">
            <h3 class="text-primary font-weight-bold">{{ $division->division_name }}</h3>
        </div>

        @if ($division->description ==null)
        <p class="m-3">Tidak Ada Deskripsi</p>
        @else
        <p class="m-3">{{ $division->description }}</p>
        @endif
        <div class="d-flex justify-content-end">
            <a href="/division" class="btn btn-info mx-3 my-3 px-4 py-1">Kembali</a>
        </div>
    </div>

    <div class="col-auto">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                <h4 class="mx-2 my-0 text-primary font-weight-bold">Jabatan Yang Ada Pada Divisi Ini :</h4>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Jabatan</th>
                            <th scope="col">Tombil Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($position as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->position_name }}</td>
                                <td>
                                    <button class="btn btn-info py-1"><a href="/position/{{ $item->id }}"
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
