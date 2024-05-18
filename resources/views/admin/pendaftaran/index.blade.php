@extends('layouts.dashboard') <!-- Sesuaikan dengan layout admin yang Anda gunakan -->

@section('content')
    <div class="container-fluid mt-5 card p-4">
        <h2 class="mb-4 fw-bold">Pendaftaran</h2>

        @if(count($pendaftaranMenunggu) > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nama Perusahaan</th>
                            <th scope="col">Alamat Perusahaan</th>
                            <th scope="col">Tanggal Pendaftaran</th>
                            <th scope="col">Judul </th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Status</th>
                            <th scope="col">SPK</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftaranMenunggu as $pendaftaran)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $pendaftaran->user->name }}</td>
                                <td>{{ $pendaftaran->nama_perusahaan }}</td>
                                <td>{{ $pendaftaran->alamat_perusahaan }}</td>
                                <td>{{ $pendaftaran->created_at }}</td>
                                <td>{{ $pendaftaran->judul_bimtek }}</td>
                                <td>{{ $pendaftaran->deskripsi_bimtek }}</td>
                                <td>
                                    <span class="badge badge-primary">{{ $pendaftaran->status }}</span>
                                </td>
                                <td>
                                    {!! $pendaftaran->spk ? '<embed src="' . asset('storage/' . $pendaftaran->spk) . '" type="application/pdf" width="200" height="100"></embed>' : 'belum disetujui' !!}
                                </td>
                                
                                
                                
                                
                                <td>
                                    <a href="{{ route('showDetail', ['id' => $pendaftaran->id]) }}" class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>Tidak ada pendaftaran menunggu persetujuan.</p>
        @endif
    </div>

@endsection
