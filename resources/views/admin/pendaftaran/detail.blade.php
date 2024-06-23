@extends('layouts.dashboard') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <div class="container-fluid my-4 card p-3">
        <h1 class="mb-4 fw-semibold text-center">Detail Pendaftaran</h1>

        <div class="row">
            <div class="col-md-6">
                <!-- Informasi Pendaftaran -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" class="form-control" name="nama" value="{{ $pendaftaran->user->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="no_tlp" class="form-label">No. Telepon:</label>
                    <input type="text" class="form-control" name="no_tlp" value="{{ $pendaftaran->no_tlp }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan:</label>
                    <input type="text" class="form-control" name="jabatan" value="{{ $pendaftaran->jabatan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan:</label>
                    <input type="text" class="form-control" name="nama_perusahaan" value="{{ $pendaftaran->nama_perusahaan }}" readonly>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="no_perusahaan" class="form-label">No. Perusahaan:</label>
                    <input type="text" class="form-control" name="no_perusahaan" value="{{ $pendaftaran->no_perusahaan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan:</label>
                    <textarea class="form-control" name="alamat_perusahaan" rows="3" readonly>{{ $pendaftaran->alamat_perusahaan }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="judul_bimtek" class="form-label">Judul Bimtek:</label>
                    <input type="text" class="form-control" name="judul_bimtek" value="{{ $pendaftaran->judul_bimtek }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="deskripsi_bimtek" class="form-label">Deskripsi Bimtek:</label>
                    <textarea class="form-control" name="deskripsi_bimtek" rows="3" readonly>{{ $pendaftaran->deskripsi_bimtek }}</textarea>
                </div>

                <!-- Form Surat Perjanjian Kerja dengan Tanda Tangan Digital -->
                @if ($pendaftaran->status == 'menunggu persetujuan admin')
                    <form id="approval-form" action="{{ route('approve', $pendaftaran->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="surat_perjanjian" class="form-label">Surat Perjanjian Kerja:</label>
                            <textarea class="form-control" name="surat_perjanjian" rows="5" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tanda_tangan" class="form-label">Tanda Tangan Digital:</label>
                            <div id="signature-pad" class="signature-pad">
                                <canvas style="border: 1px solid blue; border-radius: 16px"></canvas>
                               
                            </div>
                            <button type="button" class="btn btn-danger" id="clear-signature">Hapus </button>
                            <input type="hidden" name="tanda_tangan_base64" id="tanda_tangan_base64">
                        </div>

                        <button type="button" class="btn btn-primary" id="save-button">Simpan Surat Perjanjian Kerja</button>
                    </form>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var canvas = document.querySelector('canvas');
                            var signaturePad = new SignaturePad(canvas);

                            document.getElementById('clear-signature').addEventListener('click', function () {
                                signaturePad.clear();
                            });

                            document.getElementById('save-button').addEventListener('click', function () {
                                if (signaturePad.isEmpty()) {
                                    alert("Tanda tangan diperlukan.");
                                } else {
                                    var signature = signaturePad.toDataURL('image/png');
                                    document.getElementById('tanda_tangan_base64').value = signature;

                                    // Debugging: Log signature to console
                                    console.log("Tanda tangan base64: ", signature);

                                    // Uncomment this if you want to submit the form after verification
                                    document.getElementById('approval-form').submit();
                                }
                            });
                        });
                    </script>
                @endif
            </div>
        </div>
    </div>
@endsection
