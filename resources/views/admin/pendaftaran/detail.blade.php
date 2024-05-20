<!-- resources/views/pendaftaran/detail.blade.php -->

@extends('layouts.dashboard') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <div class="container-fluid my-4 card p-3">
        <h1 class="mb-4 fw-semibold text-center">Detail Pendaftaran</h1>

        <div class="row">
            <div class="col-md-6">
                <!-- Informasi Pendaftaran -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" class="form-control" name="nama" value="{{ $pendaftaran->user->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="no_tlp" class="form-label">no_tlp:</label>
                    <input type="text" class="form-control" name="no_tlp" value="{{ $pendaftaran->no_tlp }}" readonly>
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
                <div class="mb-3">
                    <label for="no_perusahaan" class="form-label">No. Perusahaan:</label>
                    <input type="text" class="form-control" name="no_perusahaan" value="{{ $pendaftaran->no_perusahaan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan:</label>
                    <input class="form-control" name="alamat_perusahaan" value="{{ $pendaftaran->alamat_perusahaan }}" rows="3" readonly>
                </div>
                <div class="mb-3">
                    <label for="judul_bimtek" class="form-label">Judul Bimtek:</label>
                    <input type="text" class="form-control" name="judul_bimtek" value="{{ $pendaftaran->judul_bimtek }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="deskripsi_bimtek" class="form-label">Deskripsi Bimtek:</label>
                    <textarea class="form-control" name="deskripsi_bimtek" rows="3" readonly>{{ $pendaftaran->deskripsi_bimtek }}</textarea>
                </div>

              
            </div>
            @if ($pendaftaran->status == 'menunggu persetujuan admin')
            <div class="row  m-3 p-3 shadow">
                <div class="col-md-11">
                    <h2 class="fw-semibold">
                        Setujui Pendaftaran
                    </h2>
                    <form action="{{ route('approve', ['id' => $pendaftaran->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
            
                     
                        <div class="mb-3">
                            <label for="surat_keputusan" class="form-label">Surat Keputusan:</label>
                            <input type="file" class="form-control" name="spk" accept="application/pdf" required>
                        </div>
            
                        <button type="submit" class="btn btn-primary ">Setujui dan kirim SPK</button>
                        <button type="submit" class="btn btn-danger ">Tolak</button>
                    </form>
                </div>
            </div>
            @endif
        </div>
       
    </div>
@endsection
