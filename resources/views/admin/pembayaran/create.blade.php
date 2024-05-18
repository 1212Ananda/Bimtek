@extends('layouts.dashboard') <!-- Sesuaikan dengan layout admin yang Anda gunakan -->

@section('content')
    <div class="container-fluid mt-5 card p-4">
        <h2 class="mb-4 fw-bold">Buat Kode Billing</h2>
        <form action="{{ route('kode_billing.store', $pendaftaran->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kode_billing" class="form-label">Kode Billing</label>
                <input type="text" class="form-control" id="kode_billing" name="kode_billing" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran</label>
                <input type="number" class="form-control" id="jumlah_pembayaran" 
                       name="jumlah_pembayaran" 
                       value="{{ $pendaftaran->biaya ?? '' }}" 
                       {{ $pendaftaran->biaya ? 'readonly' : 'required' }}>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
