<!-- resources/views/pendaftaran/detail.blade.php -->

@extends('layouts.landingpage') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <style>
        body {
            margin-top: 20px;
        }

        .timeline-steps {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .timeline-step {
            align-items: center;
            display: flex;
            flex-direction: column;
            position: relative;
            margin: 1rem;
        }

        .timeline-step:not(:last-child):after {
            content: "";
            display: block;
            border-top: .25rem dotted #3b82f6;
            width: 3.46rem;
            position: absolute;
            left: 7.5rem;
            top: .3125rem;
        }

        .timeline-step:not(:first-child):before {
            content: "";
            display: block;
            border-top: .25rem dotted #3b82f6;
            width: 3.8125rem;
            position: absolute;
            right: 7.5rem;
            top: .3125rem;
        }

        .timeline-content {
            width: 10rem;
            text-align: center;
        }

        .timeline-content .inner-circle {
            border-radius: 1.5rem;
            height: 1rem;
            width: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #cdd8eb;
        }

        .timeline-content .inner-circle:before {
            content: "";
            background-color: #cdd8eb;
            display: inline-block;
            height: 3rem;
            width: 3rem;
            min-width: 3rem;
            border-radius: 6.25rem;
            opacity: .5;
        }

        .timeline-content.active .inner-circle {
            background-color: #7e76f1;
        }

        .timeline-content.active .inner-circle:before {
            background-color: #2c1ef3;
        }
    </style>

    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h2 class="mb-4 fw-semibold text-center">
            @if ($pendaftaran->status == 'menunggu persetujuan admin')
                Detail Pendaftaran
            @elseif ($pendaftaran->status == 'Menunggu Pembayaran')
                Detail Pembayaran
            @endif
        </h2>
        <div class="card p-5 my-4  shadow" style="border-radius: 16px;border:1px solid blue">
            @if ($pendaftaran->status == 'menunggu persetujuan admin' || $pendaftaran->status == 'menunggu kode billing')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-1 row">
                        <div class="col-md-4">
                            <label for="nama" class="form-label fw-semibold"><i class="bi bi-person"></i> Nama</label>
                        </div>
                        <div class="col-md-8">
                            <span>: {{ $pendaftaran->user->name }}</span>
                        </div>
                    </div>
            
                    <div class="mb-1 row">
                        <div class="col-md-4">
                            <label for="jabatan" class="form-label fw-semibold"><i class="bi bi-briefcase"></i> Jabatan</label>
                        </div>
                        <div class="col-md-8">
                            <span>: {{ $pendaftaran->jabatan }}</span>
                        </div>
                    </div>
            
                    <div class="mb-1 row">
                        <div class="col-md-4">
                            <label for="nama_perusahaan" class="form-label fw-semibold"><i class="bi bi-building"></i> Nama Perusahaan</label>
                        </div>
                        <div class="col-md-8">
                            <span>: {{ $pendaftaran->nama_perusahaan }}</span>
                        </div>
                    </div>
                    
                    <div class="mb-1 row">
                        <div class="col-md-4">
                            <label for="status" class="form-label fw-semibold"><i class="bi bi-info-circle"></i> Status</label>
                        </div>
                        <div class="col-md-8">
                            <span>: <span class="badge p-2 bg-warning" style="border-radius: 32px"> Menunggu persetujuan admin</span></span>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="mb-1 row">
                        <div class="col-md-4">
                            <label for="judul_bimtek" class="form-label fw-semibold"><i class="bi bi-book"></i> Judul Bimtek</label>
                        </div>
                        <div class="col-md-8">
                            <span>: {{ $pendaftaran->judul_bimtek }}</span>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <div class="col-md-4">
                            <label for="deskripsi_bimtek" class="form-label fw-semibold"><i class="bi bi-card-text"></i> Deskripsi Bimtek</label>
                        </div>
                        <div class="col-md-8">
                            <span>: {{ $pendaftaran->deskripsi_bimtek }}</span>
                        </div>
                    </div>
            
            
                    <div class="mb-1 row">
                        <div class="col-md-4">
                            <label for="no_perusahaan" class="form-label fw-semibold"><i class="bi bi-telephone-fill"></i> No. Perusahaan</label>
                        </div>
                        <div class="col-md-8">
                            <span>: {{ $pendaftaran->no_perusahaan }}</span>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <div class="col-md-4">
                            <label for="alamat_perusahaan" class="form-label fw-semibold"><i class="bi bi-geo-alt"></i> Alamat Perusahaan</label>
                        </div>
                        <div class="col-md-8">
                            <span>: {{ $pendaftaran->alamat_perusahaan }}</span>
                        </div>
                    </div>
            
            
                </div>
            </div>
            
            @endif

            @if ($pendaftaran->status == 'Menunggu Pembayaran')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-1 row">
                            <div class="col-md-3">
                                <label for="judul_bimtek" class="form-label fw-semibold">Nama Pemohon</label>
                            </div>
                            <div class="col-md-9">
                                <span>: {{ $pendaftaran->user->name }}</span>
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-md-3">
                                <label for="judul_bimtek" class="form-label fw-semibold">Nama Pelatihan</label>
                            </div>
                            <div class="col-md-9">
                                <span>: {{ $pendaftaran->judul_bimtek }}</span>
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-md-3">
                                <label for="judul_bimtek" class="form-label fw-semibold ">Kode Billing</label>
                            </div>
                            <div class="col-md-9">
                                <span>: {{ $pendaftaran->pembayaran->kode_billing }}</span>
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-md-3">
                                <label for="deskripsi_bimtek" class="form-label fw-semibold">Jumlah Pembayaran</label>
                            </div>
                            <div class="col-md-9">
                                <span>: {{ $pendaftaran->pembayaran->jumlah_pembayaran }}</span>
                            </div>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-md-3">
                                <label for="deskripsi_bimtek" class="form-label fw-semibold">SPK yang harus ditandatangani</label>
                            </div>
                            <div class="col-md-9">
                                @if ($pendaftaran->spk)
                                    <div class="d-flex flex-column">
                                        {!! $pendaftaran->spk
                                            ? '<embed src="' .
                                                asset('storage/' . $pendaftaran->spk) .
                                                '" type="application/pdf" width="200" height="100"></embed>'
                                            : 'belum disetujui' !!}
                                        <a href="{{ asset('storage/' . $pendaftaran->spk) }}" target="_blank">Unduh SPK</a>
                                    </div>
                                @else
                                    <span>Belum disetujui</span>
                                @endif

                            </div>
                        </div>


                    </div>

                    <div class="col-md-6 ">
                        <div class="card border-0 shadow p-3">
                            <form action="{{ route('upload_bukti_pembayaran', $pendaftaran->id) }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="spkFile" class="form-label fw-semibold">Upload Perjanjian SPK</label>
                                    <input class="form-control" type="file" id="spkFile" name="spk">
                                </div>
                                <div class="mb-3">
                                    <label for="buktiPembayaranFile" class="form-label fw-semibold">Upload Bukti Pembayaran</label>
                                    <input class="form-control" type="file" id="buktiPembayaranFile"
                                        name="bukti_pembayaran">
                                </div>
                                <button type="submit" class="btn btn-primary float-end">Kirim</button>
                            </form>
                        </div>
                    </div>

                </div>
            @endif

            @if ($pendaftaran->status === 'Menunggu Konfirmasi Surat Keputusan')
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Mohon Bersabar</h4>
                    <p>Surat keputusan dan bukti pembayaran Anda telah berhasil dikirim. Kami sedang menunggu konfirmasi
                        dari admin. Terima kasih atas kesabaran Anda.</p>
                    <hr>
                    <p class="mb-0"></p>
                </div>
            @endif

            @if ($pendaftaran->status === 'Disetujui')
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Pendaftaran Berhasil</h4>
                <p>Permohonan bimbingan teknis Anda telah disetujui! Harap menunggu jadwal pelatihan diterbitkan. Terima kasih.</p>
                <hr>
                <p class="mb-0">Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.</p>
                <a href="{{ route('lihat-jadwal') }}" class="btn btn-primary float-end">Lihat Jadwal</a>
            </div>
            
            @endif

        </div>

        @include('components.timeline')
    @endsection
