<!-- di dalam resources/views/pendaftaran/riwayat.blade.php -->

@extends('layouts.landingpage') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <div class="container mt-5">
        
        @if(count($riwayatPendaftaran) > 0)
        <h1 class="mb-4 fw-semibold text-center">Riwayat Pendaftaran</h1>
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
                                   <span class="badge bg-warning">
                                    {{ $pendaftaran->status }}
                                   </span>
                                </td>
                                <td>{{ $pendaftaran->created_at }}</td>
                              
                                <td>
                                    @if ($pendaftaran->status === 'approved')
                                        @if ($pendaftaran->konfirmasi_pembayaran)
                                            <a href="{{ route('lihat-jadwal') }}" class="btn btn-primary">Lihat Jadwal</a>
                                        @endif
                                    @else
                                        <form action="{{ route('cancel_pendaftaran', ['id' => $pendaftaran->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Batalkan</button>
                                            <a href="{{ route('detailPendaftaran', ['id' => $pendaftaran->id]) }}" class="btn btn-info">Detail</a>
                                        </form>
                                    @endif
                                   </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center fw-bold">Belum ada riwayat pendaftaran.</p>
        @endif
    </div>
@endsection
