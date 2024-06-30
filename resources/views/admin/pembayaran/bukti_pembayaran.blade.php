@extends('layouts.dashboard') <!-- Sesuaikan dengan layout admin yang Anda gunakan -->

@section('content')
    <div class="container-fluid mt-5">
        <div class="card shaodw border-0">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">bukti pembayaran</h6>
            </div>
            <div class="card-body">
                @if (count($pembayaran) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nama Perusahaan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Kode Billing</th>
                                <th scope="col">Jumlah Pembayaran</th>
                                <th scope="col">Bukti Pembayaran</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $pembayaran)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $pembayaran->pendaftaran->user->name }}</td>
                                    <td>{{ $pembayaran->pendaftaran->nama_perusahaan }}</td>
                                    <td><span class="badge bg-warning text-white">{{ $pembayaran->status }}</span></td>
    
                                    <td>{{ $pembayaran->kode_billing }}</td>
                                    <td>{{ $pembayaran->jumlah_pembayaran }}</td>
                                    <td><embed src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" width="100" height="100" alt=""></embed>
                                        <a href="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" target="_blank">Lihat bukti pembayaran</a>
                                    </td>
                                    <td>
                                        <form id="confirmationForm{{ $pembayaran->id }}" action="{{ route('konfirmasi-pembayaran', $pembayaran->id) }}" method="POST">
                                            @csrf
                                            <button type="button" class="btn btn-primary" onclick="confirmPayment({{ $pembayaran->id }})">Konfirmasi Pembayaran</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center">Tidak ada pembayaran menunggu persetujuan.</p>
            @endif
            </div>
        </div>
       
    </div>

    <script>
        function confirmPayment(paymentId) {
            if (confirm("Apakah Anda yakin ingin mengkonfirmasi pembayaran ini?")) {
                document.getElementById("confirmationForm" + paymentId).submit();
            }
        }
    </script>
@endsection
