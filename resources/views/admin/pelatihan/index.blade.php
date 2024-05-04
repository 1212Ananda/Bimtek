@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <a href="{{ route('pelatihan.create') }}" class="btn btn-primary mb-4">Tambah</a>
        <div class="card p-3 shadow border-0">
            <table class="table">
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
                                    <a href="{{ route('pelatihan.show', $pelatihan->id) }}"
                                        class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('pelatihan.edit', $pelatihan->id) }}"
                                        class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endsection
