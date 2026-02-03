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
                    Data Fasilitas Ruangan
                    <a href="{{route('backend.fasilitas-ruangan.create')}}" class="btn btn-info btn-sm" style="color:white; float: right;">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table" id="dataFasilitasRuangan">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Fasilitas</th>
                                    <th>Ruangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->fasilitas->fasilitas_id}}</td>
                                        <td>{{$item->ruangan->ruangan_id}}</td>
                                        <td>
                                            <a href="{{ route('backend.fasilitas-ruangan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                            <a href="{{route('backend.fasilitas-ruangan.destroy',$data->id)}}" data-confirm-delete='true'>
                                            </a>
                                            <form action="{{ route('backend.fasilitas-ruangan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
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
    $('#dataFasilitasRuangan').DataTable({
      responsive: true,
      autoWidth: false
    });
  });
</script>
@endpush