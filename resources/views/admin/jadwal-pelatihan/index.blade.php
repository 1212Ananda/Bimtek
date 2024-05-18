@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card p-3">
            <h2 class="fw-bold">
                Jadwal Pelatihan
            </h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelatihan</th>
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
                        <td><a href="{{  $jadwal->first()->file_pendukung}}">Lihat</a></td>
                        <td>{{ $jadwal->first()->tanggal_pelaksanaan }}</td>
                        <td>{{ $jadwal->first()->ruangan }}</td>
                        <td>{{ $jadwal->first()->instruktur }}</td>
                        <td>
                            <a href="{{ route('jadwal-pelatihan.show', $jadwal->first()->pendaftaran_id) }}" type="button" class="btn btn-primary detail-btn" data-pelatihan="{{ $namaPelatihan }}">Detail</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection