@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="card p-3">
            <h2 class="fw-bold">
                Jadwal Pelatihan
            </h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Hari</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Nama Pelatih</th>
                        <th scope="col">Nama Pendaftar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwalPelatihan as $jadwalPelatihan)
                        <tr>
                            <td>{{ $jadwalPelatihan->hari }}</td>
                            <td>{{ $jadwalPelatihan->tanggal }}</td>
                            <td>{{ $jadwalPelatihan->tempat }}</td>
                            <td>{{ $jadwalPelatihan->nama_pelatih }}</td>
                            <td>{{ $jadwalPelatihan->pendaftaran->nama }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection