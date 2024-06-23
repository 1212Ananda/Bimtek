@extends('layouts.dashboard') <!-- Sesuaikan dengan layout admin yang Anda gunakan -->

@section('content')
    <div class="container-fluid mt-5 ">
        <div class="card shadow border-0">
          <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Kode Billing</h6>
          </div>
          <div class="card-body">
            @if(count($pembayaran) > 0)
       
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nama Perusahaan</th>
                            <th scope="col">Alamat Perusahaan</th>
                            <th>Tanggal</th>
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
        </div>
       
    </div>

@endsection
