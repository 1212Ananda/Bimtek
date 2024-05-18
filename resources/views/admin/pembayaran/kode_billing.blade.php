@extends('layouts.dashboard') <!-- Sesuaikan dengan layout admin yang Anda gunakan -->

@section('content')
    <div class="container-fluid mt-5 card p-4">
        
        @if(count($pembayaran) > 0)
        <h2 class="mb-4 fw-bold">Menunggu kode billing</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nama Perusahaan</th>
                            <th scope="col">Alamat Perusahaan</th>
                            <th>Tanggal</th>
                            <th scope="col">Kode Billing</th>
                            <th scope="col">Biaya</th>
                            <th scope="col">Surat Keputusan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembayaran as $pembayaran)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $pembayaran->user->name }}</td>
                                <td>{{ $pembayaran->nama_perusahaan }}</td>
                                <td>{{ $pembayaran->alamat_perusahaan }}</td>
                                <td>{{ $pembayaran->created_at }}</td>
                                
                                <td>{!! $pembayaran->kode_billing ? ` $pembayaran->kode_billing ` : 'KODE BILLING BELUM DIBUAT' !!}</td>
                                <td>
                                    {{$pembayaran->biaya}}
                                </td>
                               
                               
                                <td>
                                   
                                    {!! $pembayaran->spk ? '<embed src="' . asset('storage/' . $pembayaran->spk) . '" type="application/pdf" width="200" height="100"></embed>' : 'belum disetujui' !!}
                                </td>
                              
                                <td>
                                    @if ($pembayaran->status == 'menunggu persetujuan admin')
                                        <span class="badge badge-warning">{{ $pembayaran->status }}</span>
                                    @elseif ($pembayaran->status == 'menunggu kode billing')
                                    <span class="badge badge-primary">{{ $pembayaran->status }}</span>

                                    @endif
                                </td>
                                <td><a href="{{ route('kode_billing.create', $pembayaran->id) }}" class="btn btn-primary">
                                    Buat Kode billing</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center">Tidak ada pendaftaran yang menunggu kode billing.</p>
        @endif
    </div>

@endsection
