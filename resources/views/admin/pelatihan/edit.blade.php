@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Edit Data Pelatihan</h2>
            <form action="{{ route('pelatihan.update', $pelatihan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="judul_bimtek">Judul Bimtek:</label>
                    <input type="text" class="form-control" id="judul_bimtek" name="judul_bimtek" value="{{ $pelatihan->judul_bimtek }}">
                </div>
                <div class="form-group">
                    <label for="waktu">Waktu:</label>
                    <input type="datetime-local" class="form-control" id="waktu" name="waktu" value="{{ $pelatihan->waktu }}">
                </div>
                <div class="form-group">
                    <label for="biaya">Biaya:</label>
                    <input type="number" class="form-control" id="biaya" name="biaya" value="{{ $pelatihan->biaya }}">
                </div>
                <div class="form-group">
                    <label for="kontak">Kontak:</label>
                    <input type="text" class="form-control" id="kontak" name="kontak" value="{{ $pelatihan->kontak }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
