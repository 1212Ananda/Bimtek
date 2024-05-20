@extends('layouts.dashboard')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12 ">
            <h2 class="text-center mb-4">Form Input Bimtek</h2>
            <form action="{{route('pelatihan.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul Bimtek:</label>
                    <input type="text" class="form-control" id="judul" name="judul_bimtek" placeholder="Masukkan judul bimtek">
                </div>
                <div class="form-group">
                    <label for="waktu">Waktu:</label>
                    <input type="datetime-local" class="form-control" id="waktu" name="waktu">
                </div>
                <div class="form-group">
                    <label for="biaya">Biaya:</label>
                    <input type="number" class="form-control" id="biaya" name="biaya" placeholder="Masukkan biaya">
                </div>
                <div class="form-group">
                    <label for="kontak">Kontak:</label>
                    <input type="text" class="form-control" id="kontak" name="kontak" placeholder="Masukkan kontak">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
