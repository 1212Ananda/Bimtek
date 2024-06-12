@extends('layouts.dashboard')

@section('content')
<div class="container-fluid mt-5">
    <div class="card shadow border-o">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Pelatihan</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 ">
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
    </div>
</div>
@endsection
