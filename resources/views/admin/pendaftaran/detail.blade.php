<!-- resources/views/pendaftaran/detail.blade.php -->

@extends('layouts.dashboard') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Detail Pendaftaran</h1>

        <div class="row">
            <div class="col-md-6">
                <!-- Informasi Pendaftaran -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" class="form-control" name="nama" value="{{ $pendaftaran->user->name }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan:</label>
                    <input type="text" class="form-control" name="jabatan" value="{{ $pendaftaran->jabatan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan:</label>
                    <input type="text" class="form-control" name="nama_perusahaan" value="{{ $pendaftaran->nama_perusahaan }}" readonly>
                </div>
              
            </div>

            <div class="col-md-6">
                <!-- Informasi Perusahaan -->
                

                <div class="mb-3">
                    <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan:</label>
                    <textarea class="form-control" name="alamat_perusahaan" rows="3" readonly>{{ $pendaftaran->alamat_perusahaan }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="no_perusahaan" class="form-label">No. Perusahaan:</label>
                    <input type="text" class="form-control" name="no_perusahaan" value="{{ $pendaftaran->no_perusahaan }}" readonly>
                </div>
            </div>
        </div>

        <!-- Formulir untuk Mengirimkan Data ke User -->
        <form action="{{ route('approve', ['id' => $pendaftaran->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

             <!-- Tambahan Informasi Pendaftaran -->
             <div class="mb-3">
                <label for="kode_billing" class="form-label">Kode Billing:</label>
                <input type="text" class="form-control" value="{{$pendaftaran->kode_billing}}" name="kode_billing" >
            </div>

            <div class="mb-3">
                <label for="surat_keputusan" class="form-label">Surat Keputusan:</label>
                <input type="file" class="form-control" name="surat_keputusan" accept="application/pdf" required>
            </div>

            <button type="submit" class="btn btn-primary">approve</button>
        </form>
    </div>
@endsection
