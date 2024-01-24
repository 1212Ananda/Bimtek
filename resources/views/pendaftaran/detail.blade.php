<!-- resources/views/pendaftaran/detail.blade.php -->

@extends('layouts.landingpage') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 fw-semibold text-center">Detail Pendaftaran</h1>

        @if ($pendaftaran->bukti_pembayaran != null)
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">Pemberitahuan!</h4>
            <p>Bukti pembayaran dan surat keputusanmu sedang diperiksa oleh admin. Silahkan tunggu konfirmasi lebih lanjut.</p>
        </div>
    @endif
    
<div class="card p-3 my-4">
<div class="row">
    <div class="col-md-6">
        <div class="mb-1 row">
            <div class="col-md-3">
                <label for="nama" class="form-label">Nama</label>
            </div>
            <div class="col-md-9">
                <span>: {{ $pendaftaran->user->name }}</span>
            </div>
        </div>
        
        <div class="mb-1 row">
            <div class="col-md-3">
                <label for="jabatan" class="form-label">Jabatan</label>
            </div>
            <div class="col-md-9">
                <span>: {{ $pendaftaran->jabatan }}</span>
            </div>
        </div>
        
        <div class="mb-1 row">
            <div class="col-md-3">
                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
            </div>
            <div class="col-md-9">
                <span>: {{ $pendaftaran->nama_perusahaan }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-6">

        <div class="mb-1 row">
            <div class="col-md-3">
                <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan</label>
            </div>
            <div class="col-md-9">
                <span>: {{ $pendaftaran->alamat_perusahaan }}</span>
            </div>
        </div>
        
        <div class="mb-1 row">
            <div class="col-md-3">
                <label for="no_perusahaan" class="form-label">No. Perusahaan</label>
            </div>
            <div class="col-md-9">
                <span>: {{ $pendaftaran->no_perusahaan }}</span>
            </div>
        </div>
        
        <div class="mb-1 row">
            <div class="col-md-3">
                <label for="kode_billing" class="form-label">Kode Billing</label>
            </div>
            <div class="col-md-9">
                <span class="text-danger fw-bold">: {{ $pendaftaran->kode_billing }}</span>
            </div>
        </div>
    </div>
</div>
    
    
    
</div>
<div class="row">
    <div class="col-md-12">

        @if ($pendaftaran->bukti_pembayaran == null)
        <div class="card p-3 my-4 col-md-12">
        
            <!-- Formulir untuk Mengirimkan Data ke User -->
            <form action="{{ route('upload_bukti_pembayaran', ['id' => $pendaftaran->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <a href="{{ asset('storage/' . $pendaftaran->surat_keputusan) }}" target="_blank">Lihat Surat Keputusan</a>
                       <div>
        
                           <embed src="{{ asset('storage/' . $pendaftaran->surat_keputusan) }}" type="application/pdf" width="200"  height="100">
                       </div>
                </div>
                <div class="mb-1">
                    <label for="surat_keputusan" class="form-label">Upload ttd Surat Keputusan:</label>
                    <input type="file" class="form-control" name="surat_keputusan" accept="application/pdf" required>
                    @error('surat_keputusan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="bukti_pembayaran" class="form-label">bukti Pembayaran:</label>
                    <input type="file" class="form-control" name="bukti_pembayaran" required>
                    @error('bukti_pembayaran')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <button type="submit" class="btn btn-primary float-end">Submit</button>
            </form>
            
        </div>
        @endif
    </div>
</div>
    </div>
@endsection
