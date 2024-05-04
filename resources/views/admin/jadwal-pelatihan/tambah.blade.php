@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card p-3">
            <h2 class="fw-bold">
               Tambah Jadwal Pelatihan
            </h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pendaftar</th>
                        <th scope="col">judul bimtek</th>
                        <th scope="col">deskripsi bimtek</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftaran as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->judul_bimtek }}</td>
                            <td>{{ $item->deskripsi_bimtek }}</td>
                            <td><a href="{{ route('jadwal-pelatihan.edit', $item->id) }}" class="btn btn-primary">Buat Jadwal</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection