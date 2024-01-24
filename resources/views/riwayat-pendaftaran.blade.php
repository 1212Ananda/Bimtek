<!-- di dalam resources/views/pendaftaran/riwayat.blade.php -->

@extends('layouts.landingpage') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="mb-4 fw-semibold text-center">Riwayat Pendaftaran</h1>

        @if(count($riwayatPendaftaran) > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead >
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal Pendaftaran</th>
                            <th scope="col">Status Pembayaran</th>

                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayatPendaftaran as $pendaftaran)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $pendaftaran->user->name }}</td>
                                <td>{{ $pendaftaran->jabatan }}</td>
                                <td>{{ $pendaftaran->no_tlp }}</td>
                                <td>
                                    @if ($pendaftaran->status === 'pending')
                                        <span class="badge bg-danger">Menunggu Persetujuan</span>
                                    @else 
                                        <span class="badge bg-success">Disetujui</span>
                                   
                                    @endif
                                </td>
                                <td>{{ $pendaftaran->created_at }}</td>
                                <td>
                                    @if ($pendaftaran->konfirmasi_pembayaran)
                                        <span class="badge bg-success">Pembayaran Diterima</span>
                                    @else
                                        @if ($pendaftaran->bukti_pembayaran > 0)
                                            Pembayaran sedang dicek 
                                        @else
                                            <span class="text-danger fw-bold">Belum Dibayar</span>
                                        @endif
                                    @endif

                                </td>
                                <td>
                                    @if ($pendaftaran->status === 'approved')
                                        @if ($pendaftaran->konfirmasi_pembayaran)
                                            <a href="{{ route('lihat-jadwal') }}" class="btn btn-primary">Lihat Jadwal</a>
                                        @else
                                            <a href="{{ route('detailPendaftaran', ['id' => $pendaftaran->id]) }}" class="btn btn-info">Cek Pembayaran</a>
                                        @endif
                                    @else
                                        <form action="{{ route('cancel_pendaftaran', ['id' => $pendaftaran->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Batalkan</button>
                                        </form>
                                    @endif
                                   </td>
                                {{-- <td>
                                    @if ($pendaftaran->status === 'approved' && $pendaftaran->bukti_pembayaran)
                                        @if ($pendaftaran->bukti_pembayaran > 0)
                                            <img src="{{ asset('uploads/' . $pendaftaran->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-fluid">
                                        @endif
                                    @endif
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>Belum ada riwayat pendaftaran.</p>
        @endif
    </div>
@endsection
