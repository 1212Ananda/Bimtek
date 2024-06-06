@extends('layouts.landingpage') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <div class="container mt-5">

        @if (count($riwayatPendaftaran) > 0)
            <h1 class="mb-4 fw-semibold text-center">Riwayat Pendaftaran</h1>
            <div class="card p-3 shadow " style="border: 1px solid blue; border-radius: 16px">
                <div class="table-responsive">
                    <table class="table border-0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nama Pelatihan</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">No. Telepon</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal Pendaftaran</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayatPendaftaran as $pendaftaran)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $pendaftaran->user->name }}</td>
                                    <td>{{ $pendaftaran->judul_bimtek }}</td>
                                    <td>{{ $pendaftaran->jabatan }}</td>
                                    <td>{{ $pendaftaran->no_tlp }}</td>
                                    @php
                                        $statuses = [
                                            'Disetujui' => 'bg-success',
                                            'Ditolak' => 'bg-danger',
                                            'menunggu persetujuan admin' => 'bg-warning',
                                        ];
                                    @endphp

                                    <td>
                                        @php
                                            $statusClass = 'bg-secondary'; // Default class

                                            foreach ($statuses as $status => $class) {
                                                if ($pendaftaran->status == $status) {
                                                    $statusClass = $class;
                                                    break;
                                                }
                                            }
                                        @endphp

                                        <span class="badge {{ $statusClass }}">
                                            {{ $pendaftaran->status }}
                                        </span>
                                    </td>

                                    <td>{{ \Carbon\Carbon::parse($pendaftaran->created_at)->translatedFormat('d F Y \j\a\m H.i') }}</td>

                                    <td>
                                        <div class="d-flex gap-1">
                                            @if ($pendaftaran->status === 'Disetujui')
                                            @if ($pendaftaran->konfirmasi_pembayaran)
                                                <a href="{{ route('lihat-jadwal') }}" class="btn btn-primary">Lihat Jadwal</a>
                                            @endif
                                        @elseif ($pendaftaran->status === 'menunggu persetujuan admin')
                                            <form action="{{ route('cancel_pendaftaran', ['id' => $pendaftaran->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Batalkan</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('detailPendaftaran', ['id' => $pendaftaran->id]) }}" class="btn btn-info">Detail</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <p class="text-center fw-bold">Belum ada riwayat pendaftaran.</p>
        @endif
    </div>
@endsection
