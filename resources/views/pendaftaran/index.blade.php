<!-- di dalam create.blade.php -->

@extends('layouts.landingpage') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <div class="container my-5">

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
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
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="nama"
                                disabled required>
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




                    </div>
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan:</label>
                            <input type="text" class="form-control" name="alamat_perusahaan" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_perusahaan" class="form-label">No. Tlp Perusahaan:</label>
                            <input type="text" class="form-control" name="no_perusahaan" required>
                        </div>
                        <div class="mb-3">
                            <label for="judul_bimtek" class="form-label">Judul Bimtek</label>
                            <input type="text" class="form-control" name="judul_bimtek" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_bimtek" class="form-label">Deskripsi Bimtek</label>
                            <textarea type="text" class="form-control" name="deskripsi_bimtek" required style="height: 200px;"></textarea>

                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </div>
                </div>




            </form>

        </div>
    </div>
@endsection
