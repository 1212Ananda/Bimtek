@extends('layouts.dashboard') <!-- Sesuaikan dengan layout admin yang Anda gunakan -->

@section('content')
    <div class="container mt-5 card p-4">
        <h2 class="mb-4 fw-bold">Pendaftaran</h2>

        @if(count($pendaftaranMenunggu) > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nama Perusahaan</th>
                            <th scope="col">Alamat Perusahaan</th>
                            <th scope="col">Tanggal Pendaftaran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Kode Billing</th>
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
                                <td>@if ($pendaftaran->status === "pending")
                                    
                                    <span class="badge badge-danger">{{ $pendaftaran->status }}</span>
                                    @else
                                    <span class="badge badge-success">{{ $pendaftaran->status }}</span>
                                @endif
                                </td>
                                <td>{{ $pendaftaran->kode_billing }}</td>
                                
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
