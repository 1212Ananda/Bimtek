<!-- resources/views/components/timeline.blade.php -->

<div class="container my-5">
    <div class="row">
        <div class="col">
            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                <div class="timeline-step">
                    <div class="timeline-content {{ $pendaftaran->status === 'menunggu persetujuan admin' ? 'active' : '' }}" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                        <div class="inner-circle"></div>
                        <p class="h6 mt-3 mb-1">Isi</p>
                        <p class="h6 mb-0 mb-lg-0">Pendaftaran</p>
                    </div>
                </div>
                <div class="timeline-step">
                    <div class="timeline-content {{ $pendaftaran->status === 'Menunggu Pembayaran' ? 'active' : '' }}" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2004">
                        <div class="inner-circle"></div>
                        <p class="h6 text-muted mt-3 mb-1">Pembayaran dan</p>
                        <p class="h6 text-muted mb-0 mb-lg-0">Persetujuan</p>
                    </div>
                </div>
                <div class="timeline-step">
                    <div class="timeline-content {{ $pendaftaran->status === 'Menunggu Konfirmasi Surat Keputusan' ? 'active' : '' }}" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2005">
                        <div class="inner-circle"></div>
                        <p class="h6 mt-3 text-muted mb-1">Menunggu</p>
                        <p class="h6 text-muted mb-0 mb-lg-0">Konfirmasi</p>
                    </div>
                </div>
                <div class="timeline-step">
                    <div class="timeline-content {{ $pendaftaran->status === 'Disetujui' ? 'active' : '' }}" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2010">
                        <div class="inner-circle"></div>
                        <p class="h6 mt-3 text-muted mb-1">Selesai </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
