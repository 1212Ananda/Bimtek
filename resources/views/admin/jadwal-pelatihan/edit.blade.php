@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h1>Edit Jadwal Pelatihan ({{ $pendaftaran->judul_bimtek }})</h1>
        <div class="card p-3">
            <form action="{{ route('jadwal-pelatihan.update', $pendaftaran->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div id="jadwal-container">
                    @foreach($jadwalPelatihan as $index => $jadwal)
                        <div class="jadwal-item mb-3">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-2">
                                    <label for="tahap" class="form-label">Tahap</label>
                                    <input type="text" class="form-control" name="tahap[]" value="{{ $jadwal->tahap }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="tanggal_pelaksanaan" class="form-label">Tanggal Pelaksanaan</label>
                                    <input type="datetime-local" class="form-control" name="tanggal_pelaksanaan[]" value="{{ \Carbon\Carbon::parse($jadwal->tanggal_pelaksanaan)->format('Y-m-d\TH:i') }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="instruktur" class="form-label">Instruktur</label>
                                    <input type="text" class="form-control" name="instruktur[]" value="{{ $jadwal->instruktur }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="ruangan" class="form-label">Ruangan</label>
                                    <input type="text" class="form-control" name="ruangan[]" value="{{ $jadwal->ruangan }}" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="file_pendukung" class="form-label">File Pendukung</label>
                                    <input type="file" class="form-control" name="file_pendukung[]">
                                    @if($jadwal->file_pendukung)
                                        <div class="mt-2">
                                            <p>File saat ini: <a href="{{ asset('storage/' . $jadwal->file_pendukung) }}" target="_blank">Lihat File</a></p>
                                            <input type="hidden" name="existing_file_pendukung[]" value="{{ $jadwal->file_pendukung }}">
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger cancel-btn mt-4">Batal</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-success" id="add-jadwal">Tambah Jadwal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
                                <input type="datetime-local" class="form-control" name="tanggal_pelaksanaan[]" required>
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
                                <input type="file" class="form-control" name="file_pendukung[]">
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
