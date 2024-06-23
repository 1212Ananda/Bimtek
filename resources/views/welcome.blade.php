@extends('Layouts.landingpage')
@section('content')
<section class="container py-5">
    <div class="row d-flex justify-content-center align-items-center" style="height: 70vh">
        <div class="col-md-6">
            <p class="m-0" style="font-size: 52px; font-weight: bold;">Selamat Datang</p>
            <h3 class="fw-semibold mb-5" style="font-weight: 300;">Terima kasih telah mengunjungi situs kami. Mari bergabung dan nikmati berbagai layanan dan kemudahan yang kami tawarkan.</h3>
            @if (Auth::user() != null)
            <a href="/pendaftaran" class="btn btn-success px-4 py-2"  style="background-color: rgb(5, 174, 5);">Daftarr</a>
            @else
            <button onclick="alert('Silakan login terlebih dahulu!')" class="btn btn-success"  style="background-color: rgb(5, 174, 5);">Daftarr</button>
                
            @endif
        </div>
        <div class="col-md-6">
            <img src="../img/pelatihan.jpg" class="img-fluid" alt="Hero Image">
          </div>
          </div>
    </div>

</section>

<section class="registration-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-4">
                <h3>Alur Layanan Jasa Bimbingan dan Pelatihan</h3>
            </div>
        </div>

        <div class="row  d-flex justify-content-center ">
            <div class="col-lg-3 card p-3">
                <div class="Langkah 1">
                    <img src="../img/langkah1.jpg" alt="book images" style="width: 100px;">
                    <h3>1. Isi Data Diri Dan Permohonan</h3>
                </div>
            </div>
            <div class="col-lg-3 card p-3">
                <div class="Langkah 2">
                    <img src="../img/langkah2.jpg" alt="book images" style="width: 100px;">
                    <h3>2. Upload Kode Billing Dan Bukti Pembayaran</h3>
                </div>
            </div>
            <div class="col-lg-3 card p-3">
                <div class="Langkah 3">
                    <img src="../img/langkah3.jpg" alt="book images" style="width: 100px;">
                    <h3>3. Konfirmasi Surat Perjanjian Kerja</h3>
                </div>
            </div>   
            </div>
        </div>
        <div class="container">
            <div class="row  d-flex justify-content-center mb-3 ">
                <div class="col-lg-3 card p-3">
                    <div class="Langkah 1">
                        <img src="../img/langkah1.jpg" alt="book images" style="width: 100px;">
                        <h3>4. Menunggu Konfirmasi</h3>
                    </div>
                </div>
                <div class="col-lg-3 card p-3">
                    <div class="Langkah 2">
                        <img src="../img/langkah2.jpg" alt="book images" style="width: 100px;">
                        <h3>5. Pelaksanaan Kegiatan</h3>
                    </div>
                </div>
                <div class="col-lg-3 card p-3">
                    <div class="Langkah 3">
                        <img src="../img/langkah3.jpg" alt="book images" style="width: 100px;">
                        <h3>6. Selesai</h3>
                    </div>
                </div>
                </div>
                </div>
                
                </div>
            </div>
        </div>
        

        <div class="row mt-4">
            <div class="col-lg-12 text-center">
                <p><strong>Catatan:</strong> Setelah mengikuti langkah-langkah di atas, Anda akan menunggu persetujuan dan melanjutkan ke tahap berikutnya.</p>
            </div>
        </div>

    <div>
</section>

<section>
    <div class="container my-5">
        <h2 class="fw-semibold text-center mb-5">Bimtek yang Tersedia</h2>
       <div class="card p-3">
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
             @foreach ($pelatihans as $item)
             <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$item->judul_bimtek}}</td>
                <td>{{ \Carbon\Carbon::parse($item->waktu)->format('d F Y H:i') }}</td>
                <td>{{$item->biaya}}</td>
                <td>{{$item->kontak}}</td>
                <td><a href="{{ route('pendaftaran.paket', $item->id) }}" class="btn btn-primary">Daftar</a>
                </td>
              </tr>
             @endforeach
             
            </tbody>
          </table>
       </div>
    </div>
</section>
@endsection