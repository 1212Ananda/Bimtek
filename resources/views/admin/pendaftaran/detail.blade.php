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
                    <input type="text" class="form-control" name="nama_perusahaan"
                        value="{{ $pendaftaran->nama_perusahaan }}" readonly>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="no_perusahaan" class="form-label">No. Perusahaan:</label>
                    <input type="text" class="form-control" name="no_perusahaan"
                        value="{{ $pendaftaran->no_perusahaan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan:</label>
                    <textarea class="form-control" name="alamat_perusahaan" rows="3" readonly>{{ $pendaftaran->alamat_perusahaan }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="judul_bimtek" class="form-label">Judul Bimtek:</label>
                    <input type="text" class="form-control" name="judul_bimtek" value="{{ $pendaftaran->judul_bimtek }}"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="deskripsi_bimtek" class="form-label">Deskripsi Bimtek:</label>
                    <textarea class="form-control" name="deskripsi_bimtek" rows="3" readonly>{{ $pendaftaran->deskripsi_bimtek }}</textarea>
                </div>
            </div>

            <div class="col-md-12">
                @php
                    $nomorSurat = '123/BBKKP/VI/2024'; // Contoh nomor surat, ini bisa diambil dari database atau konteks aplikasi
                    $tanggal = \Carbon\Carbon::now(); // Mengambil tanggal saat ini, bisa disesuaikan dengan kebutuhan
                @endphp
                @if ($pendaftaran->status == 'menunggu persetujuan admin')
                    <form id="approval-form" action="{{ route('approve', $pendaftaran->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="surat_perjanjian" class="form-label">Surat Perjanjian Kerja:</label>
                            <textarea class="form-control" name="surat_perjanjian" rows="12" required>
                                <h2 class="text-center">SURAT PERJANJIAN KERJA</h2>

                                <p class="text-center">Nomor: {{ $pendaftaran->id }}123/BBKKP/VI/202</p>

                                <p>Pada hari ini, {{ $tanggal->isoFormat('dddd') }}, tanggal {{ $tanggal->day }} bulan {{ $tanggal->isoFormat('MMMM') }} tahun {{ $tanggal->year }}, kami yang bertanda tangan di bawah ini:</p>
                            
                                <h3>PIHAK PERTAMA (Penyelenggara):</h3>
                                <p>Nama       : Balai Besar Kulit, Kulit, Karet, dan Plastik Yogyakarta<br>
                                Alamat     : Yogyakarta<br>
                                No. Telp   : 0893728329</p>

                                <h3>PIHAK KEDUA (Peserta):</h3>
                                <p>Nama       : {{ $pendaftaran->user->name }}<br>
                                Jabatan    : {{ $pendaftaran->jabatan }}<br>
                                Alamat     : {{ $pendaftaran->alamat }}<br>
                                No. Telp   : {{ $pendaftaran->no_tlp }}</p>

                                <p>Dengan ini menyatakan sepakat untuk mengadakan perjanjian kerja pelatihan (bimtek) dengan ketentuan-ketentuan sebagai berikut:</p>

                                <h3>Pasal 1<br>Maksud dan Tujuan</h3>
                                <p>Pihak Pertama menyelenggarakan bimbingan teknis (bimtek) dengan tujuan untuk meningkatkan keterampilan dan pengetahuan Pihak Kedua dalam bidang [Bidang Pelatihan].</p>


                                <h3>Pasal 2<br>Hak dan Kewajiban Pihak Pertama</h3>
                                <ul>
                                    <li>Menyediakan fasilitas pelatihan yang memadai.</li>
                                    <li>Memberikan materi pelatihan sesuai dengan yang telah dijadwalkan.</li>
                                    <li>Memberikan sertifikat kepada Pihak Kedua setelah menyelesaikan pelatihan.</li>
                                </ul>

                                <h3>Pasal 3<br>Hak dan Kewajiban Pihak Kedua</h3>
                                <ul>
                                    <li>Mengikuti seluruh rangkaian pelatihan dengan penuh tanggung jawab.</li>
                                    <li>Membayar biaya pelatihan sebesar Rp.300.000 sebelum pelatihan dimulai.</li>
                                    <li>Menjaga ketertiban dan mengikuti aturan yang ditetapkan oleh Pihak Pertama selama pelatihan berlangsung.</li>
                                </ul>

                                <h3>Pasal 4<br>Biaya Pelatihan</h3>
                                <p>Biaya pelatihan yang harus dibayar oleh Pihak Kedua sebesar Rp.300.000 yang mencakup biaya materi, fasilitas, dan sertifikat pelatihan.</p>

                                <h3>Pasal 5<br>Pembatalan Pelatihan</h3>
                                <ul>
                                    <li>Jika Pihak Kedua membatalkan keikutsertaan setelah melakukan pembayaran, maka biaya yang telah dibayar tidak dapat dikembalikan.</li>
                                    <li>Jika pelatihan dibatalkan oleh Pihak Pertama, maka biaya yang telah dibayar oleh Pihak Kedua akan dikembalikan sepenuhnya.</li>
                                </ul>

                                <h3>Pasal 6<br>Penyelesaian Perselisihan</h3>
                                <p>Segala perselisihan yang timbul dari perjanjian ini akan diselesaikan secara musyawarah untuk mufakat. Jika tidak tercapai kesepakatan, maka akan diselesaikan melalui jalur hukum yang berlaku.</p>

                                <h3>Pasal 7<br>Penutup</h3>
                                <p>Perjanjian ini dibuat rangkap dua, masing-masing pihak menerima satu rangkap. Perjanjian ini mulai berlaku sejak ditandatangani oleh kedua belah pihak.</p>

                                <p>Demikian surat perjanjian ini dibuat dengan sebenar-benarnya dan tanpa ada paksaan dari pihak manapun.</p>

                                <p>PIHAK PERTAMA,</p>
                                <p>Balai Besar Kulit, Kulit, Karet, dan Plastik Yogyakarta</p>

                                <p>PIHAK KEDUA,</p>
                                <p>{{ $pendaftaran->user->name }}</p>

                               
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tanda_tangan" class="form-label">Tanda Tangan Digital:</label>
                            <div id="signature-pad" class="signature-pad">
                                <canvas style="border: 1px solid blue; border-radius: 16px"></canvas>
                            </div>
                            <button type="button" class="btn btn-danger" id="clear-signature">Hapus</button>
                            <input type="hidden" name="tanda_tangan_base64" id="tanda_tangan_base64">
                        </div>

                        <button type="button" class="btn btn-primary" id="save-button">Simpan Surat Perjanjian
                            Kerja</button>
                    </form>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var canvas = document.querySelector('canvas');
                            var signaturePad = new SignaturePad(canvas);

                            document.getElementById('clear-signature').addEventListener('click', function() {
                                signaturePad.clear();
                            });

                            document.getElementById('save-button').addEventListener('click', function() {
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
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        // Initialize CKEditor on the textarea
        CKEDITOR.replace('surat_perjanjian');
    </script>
@endsection
