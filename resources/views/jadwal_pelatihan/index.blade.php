<!-- di dalam resources/views/pendaftaran/riwayat.blade.php -->

@extends('layouts.landingpage') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <div class="container">
        @if(count($jadwalPelatihan) > 0)
            <h1>Jadwal Pelatihan</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Hari</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Nama Pelatih</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwalPelatihan as $jadwal)
                        <tr>
                            <td>{{ $jadwal->hari }}</td>
                            <td>{{ $jadwal->tanggal }}</td>
                            <td>{{ $jadwal->tempat }}</td>
                            <td>{{ $jadwal->nama_pelatih }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Belum ada jadwal pelatihan atau pembayaran belum dikonfirmasi.</p>
        @endif
    </div>
@endsection
