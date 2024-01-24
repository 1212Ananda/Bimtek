@extends('layouts.dashboard') <!-- Sesuaikan dengan layout admin yang Anda gunakan -->

@section('content')
    <div class="container mt-5 card p-4">
        <h2 class="mb-4 fw-bold">pembayaran</h2>

        @if(count($pembayaran) > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nama Perusahaan</th>
                            <th scope="col">Alamat Perusahaan</th>
                            <th scope="col">Tanggal pembayaran</th>
                            <th scope="col">Kode Billing</th>
                            <th scope="col">Bukti Pembayaran</th>
                            <th scope="col">Surat Keputusan</th>
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
                                
                                <td>{{ $pembayaran->kode_billing }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" target="_blank">Lihat Bukti Pembayaran</a>
                                    <img src="{{asset ('storage/'. $pembayaran->bukti_pembayaran)}}" width="100" alt="">

                                </td>
                                <td>
                                    @if($pembayaran->surat_permohonan)
                                        <a href="{{ asset('storage/' . $pembayaran->surat_permohonan) }}" target="_blank">Lihat Surat</a>
                                    @else
                                        Belum diunggah
                                    @endif
                                </td>
                                <td>
                                    @if ($pembayaran->status === 'approved' && !$pembayaran->konfirmasi_pembayaran)
                                    <a href="{{ route('konfirmasi-pembayaran', ['id' => $pembayaran->id, 'action' => 'approve']) }}" class="btn btn-primary">Approve</a>
                                @elseif ($pembayaran->status === 'approved' && $pembayaran->konfirmasi_pembayaran)
                                @if ($pembayaran->jadwal_pelatihan_id > 0)
                                    jadwal pelatihan sudah dikirim
                                    @else

                                    <a href="{{ route('kirim-jadwal', ['id' => $pembayaran->id]) }}" class="btn btn-primary">Kirim Jadwal</a>
                                @endif
                                @endif
                    
                                @if ($pembayaran->status === 'approved' && !$pembayaran->konfirmasi_pembayaran)
                                    <a href="{{ route('konfirmasi-pembayaran', ['id' => $pembayaran->id, 'action' => 'reject']) }}" class="btn btn-danger">Tolak</a>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>Tidak ada pembayaran menunggu persetujuan.</p>
        @endif
    </div>

@endsection
