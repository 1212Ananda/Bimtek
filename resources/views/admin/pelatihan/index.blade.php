@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        
        <div class="card shadow border-0">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pelatihan</h6>
            </div>
           <div class="card-body">
            <a href="{{ route('pelatihan.create') }}" class="btn btn-primary mb-4">Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul Bimtek</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Biaya</th>
                            <th scope="col">Kontak</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelatihans as $pelatihan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pelatihan->judul_bimtek }}</td>
                                <td>{{ $pelatihan->waktu }}</td>
                                <td>{{ $pelatihan->biaya }}</td>
                                <td>{{ $pelatihan->kontak }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('pelatihan.destroy', $pelatihan->id) }}" method="POST">
                                        <a href="{{ route('pelatihan.edit', $pelatihan->id) }}"
                                            class="btn  btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn  btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
    
                    </tbody>
                </table>
            </div>
           </div>
        </div>
    @endsection
