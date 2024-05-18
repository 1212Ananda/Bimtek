@extends('layouts.landingpage')

@section('content')
    <div class="container">
        @if(!empty($jadwalPelatihan))
            <h2 class="text-center my-3">Jadwal pelatihan : {{ $jadwalPelatihan->first()->pendaftaran->judul_bimtek }}</h2>.
            <div class="card p-3 shadow">
                
            <table class="table">
                <thead>
                    <tr>
                        <th>Tahap</th>
                        <th>Tanggal</th>
                        <th>Ruangan</th>
                        <th>Instruktur</th>
                        <th>File pendukung</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwalPelatihan as $index => $jadwal)
                        <tr>
                            <td>{{ $jadwal->tahap }}</td>
                            <td>{{ $jadwal->tanggal_pelaksanaan }}</td>
                            <td>{{ $jadwal->ruangan }}</td>
                            <td>{{ $jadwal->instruktur }}</td>
                        </td>
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
        @else
            <p class="my-5 text-center fw-semibold">~ Anda belum mendaftar pada jadwal pelatihan apapun atau pendaftaran Anda belum disetujui. ~</p>
        @endif
    </div>
@endsection
