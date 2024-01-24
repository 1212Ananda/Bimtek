@extends('Layouts.landingpage')
@section('content')
<section class="container py-5">
    <div class="row d-flex justify-content-center align-items-center" style="height: 70vh">
        <div class="col-md-6">
            <p class="m-0"> Selamat Datang</p>
            <h2 class="fw-semibold mb-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero corrupti ratione ducimus </h2> 
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
                    <h3>1. si Data Diri</h3>
                </div>
            </div>
            <div class="col-lg-3 card p-3">
                <div class="Langkah 2">
                    <img src="../img/langkah2.jpg" alt="book images" style="width: 100px;">
                    <h3>2. Pengajuan Surat Permohonan</h3>
                </div>
            </div>
            <div class="col-lg-3 card p-3">
                <div class="Langkah 3">
                    <img src="../img/langkah3.jpg" alt="book images" style="width: 100px;">
                    <h3>3. Pembuatan Surat Balasan</h3>
                </div>
            </div>
            <div class="col-lg-3 card p-3">
                <div class="Langkah 4">
                    <img src="../img/langkah4.jpg" alt="book images" style="width: 100px;">
                    <h3>4. Pembuatan kontrak kerjasama</h3>
                </div>
            </div>
            </div>
            
            </div>
        </div>
        <div class="container">
            <div class="row  d-flex justify-content-center mb-3 ">
                <div class="col-lg-3 card p-3">
                    <div class="Langkah 1">
                        <img src="../img/langkah1.jpg" alt="book images" style="width: 100px;">
                        <h3>5. Pembuatan invoice dan kode billing</h3>
                    </div>
                </div>
                <div class="col-lg-3 card p-3">
                    <div class="Langkah 2">
                        <img src="../img/langkah2.jpg" alt="book images" style="width: 100px;">
                        <h3>6. Penyerahan hasil Permohonan</h3>
                    </div>
                </div>
                <div class="col-lg-3 card p-3">
                    <div class="Langkah 3">
                        <img src="../img/langkah3.jpg" alt="book images" style="width: 100px;">
                        <h3>7. Finalisasi kegiatan</h3>
                    </div>
                </div>
                <div class="col-lg-3 card p-3">
                    <div class="Langkah 4">
                        <img src="../img/langkah4.jpg" alt="book images" style="width: 100px;">
                        <h3>8. Pelaksanaan kegiatan</h3>
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
    </div>
</section>
@endsection