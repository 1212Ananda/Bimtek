@extends('layouts.dashboard') <!-- Sesuaikan dengan layout admin yang Anda gunakan -->

@section('content')
    <div class="container-fluid mt-5">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
            </div>
    
            @if(count($pembayaran) > 0)
               <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    <td>{{ $pembayaran->kode_billing }}</td><td>{{ 'Rp ' . number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }}</td>
    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               </div>
            @else
                <p>Tidak ada pembayaran menunggu persetujuan.</p>
            @endif
        </div>
    </div>

@endsection
