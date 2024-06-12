@extends('layouts.dashboard') <!-- Sesuaikan dengan layout admin yang Anda gunakan -->

@section('content')
    <div class="container-fluid mt-5 ">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pendaftaran</h6>
            </div>
    
            @if(count($pendaftaranMenunggu) > 0)
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nama Perusahaan</th>
                                <th scope="col">Tanggal Pendaftaran</th>
                                <th scope="col">Judul </th>
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
                                    <td>{{ \Carbon\Carbon::parse($pendaftaran->created_at)->translatedFormat('d F Y \j\a\m H.i') }}</td>
    
                                    <td>{{ $pendaftaran->judul_bimtek }}</td>
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
            </div>
            @else
                <p>Tidak ada pendaftaran menunggu persetujuan.</p>
            @endif
        </div>
       
    </div>

@endsection
