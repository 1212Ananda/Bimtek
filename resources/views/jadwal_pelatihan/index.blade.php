@extends('layouts.landingpage')

@section('content')
    <div class="container">
        <h2 class="my-3 fw-semibold text-center">Jadwal Pelatihan</h2>
        <div class="card shadow">
            <div class="card-body">
                @if ($jadwalPelatihan->isEmpty())
                    <p>Tidak ada jadwal pelatihan yang tersedia.</p>
                @else
                    @foreach($jadwalPelatihan as $judulBimtek => $jadwal)
                        <h3>{{ $judulBimtek }}</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tahap</th>
                                    <th>Nama Pendaftar</th>
                                    <th>Tanggal</th>
                                    <th>Ruangan</th>
                                    <th>Nama Instruktur</th>
                                    <th>File Pendukung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jadwal as $jadwalItem)
                                    <tr>
                                        <td>{{ $jadwalItem->tahap }}</td>
                                        <td>{{ $jadwalItem->pendaftaran->user->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($jadwalItem->tanggal_pelaksanaan)->format('d-m-Y H:i:s') }}</td>

                                        <td>{{ $jadwalItem->ruangan }}</td>
                                        <td>{{ $jadwalItem->instruktur }}</td>
                                        <td>
                                            @if($jadwalItem->file_pendukung)
                                            <div class="d-flex flex-column">
                                                <embed src="{{ asset('storage/' . $jadwalItem->file_pendukung) }}" type="application/pdf" width="200" height="100"></embed>
                                                <a href="{{ asset('storage/' . $jadwalItem->file_pendukung) }}" download="SPK_{{ $jadwalItem->id }}">Unduh SPK</a>
                                            </div>
                                            
                                            @else
                                                Tidak ada file pendukung
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
