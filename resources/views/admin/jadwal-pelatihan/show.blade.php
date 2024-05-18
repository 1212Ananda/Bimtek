@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h1>Detail Jadwal Pelatihan</h1>
        <div class="card p-3">
            
        <table class="table">
            <thead>
                <tr>
                    <th>Tahap</th>
                    <th>Tanggal Pelaksanaan</th>
                    <th>Ruangan</th>
                    <th>Nama Instruktur</th>
                    <th>File Pendukung</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwalPelatihan as $jadwal)
                    <tr>
                        <td>{{ $jadwal->tahap }}</td>
                        <td>{{ $jadwal->tanggal_pelaksanaan }}</td>
                        <td>{{ $jadwal->ruangan }}</td>
                        <td>{{ $jadwal->instruktur }}</td>
                        <td><div class="d-flex flex-column">
                            {!! $jadwal->file_pendukung
                                ? '<embed src="' .
                                    asset('storage/' . $jadwal->file_pendukung) .
                                    '" type="application/pdf" width="200" height="100"></embed>'
                                : 'belum disetujui' !!}
                            <a href="{{ asset('storage/' . $jadwal->file_pendukung) }}" target="_blank">Unduh SPK</a>
                        </div></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
