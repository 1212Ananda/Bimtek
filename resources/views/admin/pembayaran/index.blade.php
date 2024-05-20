@extends('layouts.dashboard') <!-- Sesuaikan dengan layout admin yang Anda gunakan -->

@section('content')
    <div class="container-fluid mt-5 card p-4">
        <h2 class="mb-4 fw-bold">pembayaran</h2>

        @if(count($pembayaran) > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nama Perusahaan</th>
                            <th scope="col">Alamat Perusahaan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Kode Billing</th>
                            <th scope="col">Jumlah Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembayaran as $pembayaran)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $pembayaran->pendaftaran->user->name }}</td>
                                <td>{{ $pembayaran->pendaftaran->nama_perusahaan }}</td>
                                <td>{{ $pembayaran->pendaftaran->alamat_perusahaan }}</td>
                                <td>{{ $pembayaran->status }}</td>
                                <td>{{ $pembayaran->kode_billing }}</td>
                                <td>{{ $pembayaran->jumlah_pembayaran }}</td>
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
