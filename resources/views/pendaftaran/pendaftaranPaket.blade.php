@extends('layouts.landingpage') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
<div class="container my-5">

    <!-- Display session error -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class="mb-5 fw-semibold text-center">Form Pendaftaran</h1>
    <div class="card p-5 shadow-lg">

        <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="nama" disabled required>
                    </div>
                    <div class="mb-3">
                        <label for="judul_bimtek" class="form-label">Judul Bimtek:</label>
                        <input type="text" class="form-control" name="judul_bimtek" value="{{ $pelatihan->judul_bimtek }}" readonly required>
                        <input type="hidden" class="form-control" name="pelatihan_id" value="{{ $pelatihan->id }}"  required>
                    </div>

                    <div class="mb-3">
                        <label for="waktu" class="form-label">Waktu:</label>
                        <input type="text" class="form-control" name="" value="{{ $pelatihan->waktu }}" disabled required>
                    </div>

                    <div class="mb-3">
                        <label for="biaya" class="form-label">Biaya:</label>
                        <input type="text" class="form-control" name="biaya" value="{{ $pelatihan->biaya }}" readonly required>
                    </div>

                   

                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kontak" class="form-label">Kontak:</label>
                        <input type="text" class="form-control" name="kontak" value="{{ $pelatihan->kontak }}" readonly required>
                    </div>

                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan:</label>
                        <input type="text" class="form-control" name="jabatan" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_tlp" class="form-label">No. Telepon:</label>
                        <input type="number" class="form-control" name="no_tlp" required>
                    </div>
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
                    

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
