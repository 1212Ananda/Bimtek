<!-- resources/views/pendaftaran/detail.blade.php -->

@extends('layouts.landingpage') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Detail Pendaftaran</h1>

        @if ($pendaftaran->bukti_pembayaran != null)
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">Pemberitahuan!</h4>
            <p>Bukti pembayaran dan surat keputusanmu sedang diperiksa oleh admin. Silahkan tunggu konfirmasi lebih lanjut.</p>
        </div>
    @endif
    
<div class="card p-3">

    <div class="row d-flex" >
        <div class="col-md-4  ">
            <!-- Informasi Pendaftaran -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama: {{ $pendaftaran->user->name }}</label>
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan: {{ $pendaftaran->jabatan }}</label>
            </div>
            <div class="mb-3">
                <label for="nama_perusahaan" class="form-label">Nama Perusahaan: {{ $pendaftaran->nama_perusahaan }}</label>
                
            </div>
            <div class="mb-3">
                <embed src="{{ asset('storage/' . $pendaftaran->surat_keputusan) }}" type="application/pdf" width="200"  height="100">
                <p>
                
         <a href="{{ asset('storage/' . $pendaftaran->surat_keputusan) }}" download>Surat Keputusan yang wajib di ttd</a></p>
            </div>
          
        </div>

        <div class="col-md-4 ">
            <!-- Informasi Perusahaan -->
            

            <div class="mb-3">
                <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan:{{ $pendaftaran->alamat_perusahaan }}</label>
            </div>

            <div class="mb-3">
                <label for="no_perusahaan" class="form-label">No. Perusahaan: {{ $pendaftaran->no_perusahaan }}</label>
            </div>
            <div class="mb-3">
                <label for="kode_billing" class="form-label">Kode Billing: <span class="text-danger fw-bold">{{$pendaftaran->kode_billing}}</span></label>
            </div>

        </div>
    </div>
</div>
@if ($pendaftaran->bukti_pembayaran == null)
<div class="card p-3 mt-4 col-md-4">

    <!-- Formulir untuk Mengirimkan Data ke User -->
    <form action="{{ route('upload_bukti_pembayaran', ['id' => $pendaftaran->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div class="mb-3">
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
    
        <button type="submit" class="btn btn-primary d-block w-100">Submit</button>
    </form>
    
</div>
@endif
    </div>
@endsection
