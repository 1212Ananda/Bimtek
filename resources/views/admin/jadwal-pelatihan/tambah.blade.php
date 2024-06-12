@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="card shadow border-0">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jadwal Pelatihan</h6>
            </div>
            <div class="card-body">
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pendaftar</th>
                <th scope="col">Judul Bimtek</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach($pendaftaran as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->judul_bimtek }}</td>
                <td>
                    <a href="{{ route('jadwal-pelatihan.edit', $item->id) }}" class="btn btn-primary">Buat Jadwal</a>
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
