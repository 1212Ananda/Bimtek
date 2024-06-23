@extends('layouts.landingpage')

@section('content')
    <style>
        .card {
            border-radius: 32px;
            border: none;
        }

        .form-label {
            font-weight: 600;
        }

        .input-group-text {
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 8px 0 0 8px;
        }

        .form-control {
            border-radius: 0 8px 8px 0;
            border: 1px solid #ced4da;
            padding: 10px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        .btn-primary:focus {
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        .alert {
            border-radius: 8px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
        }

        textarea.form-control {
            resize: none;
        }
    </style>

    <div class="container my-5">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
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
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="nama" disabled required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                            <input type="text" class="form-control" name="jabatan" value="{{ Auth::user()->jabatan }}"readonly required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="no_tlp" class="form-label">No. Telepon:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            <input type="number" class="form-control" name="no_tlp" value="{{ Auth::user()->no_tlp }}" readonly required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <input type="text" class="form-control" name="nama_perusahaan" value="{{ Auth::user()->nama_perusahaan }}" readonly required>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                            <input type="text" class="form-control" name="alamat_perusahaan" value="{{ Auth::user()->alamat_perusahaan }}" readonly required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="no_perusahaan" class="form-label">No. Tlp Perusahaan:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" class="form-control" name="no_perusahaan" value="{{ Auth::user()->no_perusahaan }}" readonly required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="judul_bimtek" class="form-label">Judul Bimtek:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-book"></i></span>
                            <input type="text" class="form-control" name="judul_bimtek" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_bimtek" class="form-label">Deskripsi Bimtek:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                            <textarea class="form-control" name="deskripsi_bimtek" required style="height: 200px;"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
