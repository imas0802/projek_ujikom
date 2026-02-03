@extends('layouts.backend')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-secondary">
                    Data Lantai
                    <a href="{{route('backend.lantai.create')}}" class="btn btn-info btn-sm" style="color:white; float: right;">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table" id="dataLantai">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id-Gedung</th>
                                    <th>Lantai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lantai as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->gedung->nama_gedung}}</td>
                                         <td>{{$data->nama_lantai}}</td>
                                        <td>
                                            <a href="{{route('backend.lantai.edit',$data->id)}}" class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                            <a href="{{route('backend.lantai.destroy',$data->id)}}" data-confirm-delete='true'>
                                            </a>
                                            <form action="{{ route('backend.lantai.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
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
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> 
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
  $(document).ready(function () {
    $('#dataLantai').DataTable({
      responsive: true,
      autoWidth: false
    });
  });
</script>
@endpush