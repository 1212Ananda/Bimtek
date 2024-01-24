@extends('layouts.dashboard')

@section('content')
    <div class="container card p-3">
        <!-- resources/views/admin/kirim_jadwal.blade.php -->

        <form action="{{ route('proses-kirim-jadwal', ['id' => $pendaftaran->id]) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="hari" class="form-label">Hari:</label>
                <input type="text" name="hari" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal:</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tempat" class="form-label">Tempat:</label>
                <input type="text" name="tempat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nama_pelatih" class="form-label">Nama Pelatih:</label>
                <input type="text" name="nama_pelatih" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Kirim Jadwal</button>
        </form>
    </div>
@endsection
