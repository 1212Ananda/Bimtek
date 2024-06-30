@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card shadow border-0">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jadwal Bimtek</h6>
            </div>
           <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Bimtek</th>
                            <th>Nama Pendaftar</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Nama Instruktur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwalPelatihan as $namaPelatihan => $jadwal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $namaPelatihan }}</td>
                            <td>{{ $jadwal->first()->pendaftaran->user->name }}</td>
                            <td>{{ $jadwal->first()->tanggal_pelaksanaan }}</td>
                            <td>{{ $jadwal->first()->ruangan }}</td>
                            <td>{{ $jadwal->first()->instruktur }}</td>
                            <td>
                                <a href="{{ route('jadwal-pelatihan.show', $jadwal->first()->pendaftaran_id) }}" type="button" class="btn btn-primary detail-btn" data-pelatihan="{{ $namaPelatihan }}">Detail</a>
                                <a href="{{ route('jadwal-pelatihan.editPelatihan', $jadwal->first()->pendaftaran_id) }}" class="btn btn-warning edit-btn" data-pelatihan="{{ $namaPelatihan }}">Edit</a>
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