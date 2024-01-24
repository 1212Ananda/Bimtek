<!-- di dalam create.blade.php -->

@extends('layouts.landingpage') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <div class="container my-5">
        <h1 class="mb-5 fw-semibold text-center">Form Pendaftaran</h1>
        <div class="card p-5 shadow-lg">

            <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" class="form-control" value="{{Auth::user()->name}}" name="nama" readonly required>
                        </div>
            
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan:</label>
                            <input type="text" class="form-control" name="jabatan" required>
                        </div>
            
                        <div class="mb-3">
                            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir:</label>
                            <input type="text" class="form-control" name="pendidikan_terakhir" required>
                        </div>
            
                        <div class="mb-3">
                            <label for="no_tlp" class="form-label">No. Telepon:</label>
                            <input type="number" class="form-control" name="no_tlp" required>
                        </div>
                        

                <div class="mt-4">
                    <embed src="{{ asset('surat_permohonan.pdf') }}" type="application/pdf" width="200"  height="100">
                    <p><a href="{{ asset('surat_permohonan.pdf') }}" target="_blank">Template Surat Permohonan</a></p>
                </div>
                    </div>
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan:</label>
                            <input type="text" class="form-control" name="nama_perusahaan" required>
                        </div>
            
                        <div class="mb-3">
                            <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan:</label>
                            <input type="text" class="form-control" name="alamat_perusahaan" required>
                        </div>
            
                        <div class="mb-3">
                            <label for="no_perusahaan" class="form-label">No. Tlp Perusahaan:</label>
                            <input type="text" class="form-control" name="no_perusahaan" required>
                        </div>
                        <div class="mb-3">
                            <label for="surat_permohonan" class="form-label">Surat Permohonan:</label>
                            <input type="file" class="form-control" name="surat_permohonan" accept="application/pdf" required>
                            <div class="text-danger">
                                @error('surat_permohonan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </div>
                </div>
    

                
                
            </form>
            
        </div>
    </div>
@endsection
