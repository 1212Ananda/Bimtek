@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="card p-3">
            <h2 class="fw-bold mb-4">
               Tambah Jadwal Pelatihan {{$pendaftaran->judul_bimtek}}
            </h2>
            <form action="{{ route('jadwal-pelatihan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="jadwal-container">
                    <div class="jadwal-item mb-3">
                        <input type="hidden" name="pendaftaran_id" value="{{ $pendaftaran->id }}">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-2">
                                <label for="tahap" class="form-label">Tahap</label>
                                <input type="text" class="form-control" name="tahap[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="tanggal_pelaksanaan" class="form-label">Tanggal Pelaksanaan</label>
                                <input type="date" class="form-control" name="tanggal_pelaksanaan[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="instruktur" class="form-label">Instruktur</label>
                                <input type="text" class="form-control" name="instruktur[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="ruangan" class="form-label">Ruangan</label>
                                <input type="text" class="form-control" name="ruangan[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="file_pendukung" class="form-label">File Pendukung</label>
                                <input type="file" class="form-control" name="file_pendukung[]" required>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger cancel-btn mt-4">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-success" id="add-jadwal">Tambah Jadwal</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $('#add-jadwal').click(function () {
                var jadwalItem = `
                    <div class="jadwal-item mb-3">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-2">
                                <label for="tahap" class="form-label">Tahap</label>
                                <input type="text" class="form-control" name="tahap[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="tanggal_pelaksanaan" class="form-label">Tanggal Pelaksanaan</label>
                                <input type="date" class="form-control" name="tanggal_pelaksanaan[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="instruktur" class="form-label">Instruktur</label>
                                <input type="text" class="form-control" name="instruktur[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="ruangan" class="form-label">Ruangan</label>
                                <input type="text" class="form-control" name="ruangan[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="file_pendukung" class="form-label">File Pendukung</label>
                                <input type="file" class="form-control" name="file_pendukung[]" required>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger cancel-btn mt-4">Batal</button>
                            </div>
                        </div>
                    </div>
                `;
                $('#jadwal-container').append(jadwalItem).slideDown();
            });

            // Menambahkan event listener untuk tombol pembatalan
            $(document).on('click', '.cancel-btn', function () {
                $(this).closest('.jadwal-item').remove(); // Menghapus item jadwal dari DOM
            });
        });
    </script>
@endsection
