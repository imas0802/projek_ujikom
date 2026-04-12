@extends('layouts.backend')

@section('content')
<div class="container-fluid">

    <div class="card card-clean">
        <div class="card-header card-header-clean d-flex justify-content-between align-items-center">
            <span>Data Lantai</span>

            <a href="{{route('backend.lantai.create')}}" class="btn btn-main btn-sm">
                + Tambah
            </a>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-clean align-middle" id="dataLantai">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gedung</th>
                            <th>Lantai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lantai as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td class="fw-semibold">{{$data->gedung->nama_gedung}}</td>
                            <td>{{$data->nama_lantai}}</td>

                            <td>
                                <a href="{{route('backend.lantai.edit',$data->id)}}"
                                    class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('backend.lantai.destroy', $data->id) }}"
                                    method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection