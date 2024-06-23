@extends('layouts.dashboard') <!-- Sesuaikan dengan layout admin yang Anda gunakan -->

@section('content')
    <div class="container-fluid mt-5">
      <div class="card shadow border-0">
        <div class="card-header">
          <h4 class="m-0 font-weight-bold text-primary">Buat Kode Billing</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
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

                        <div class="mb-3">
                            <label for="bank" class="form-label">Bank</label>
                            <input type="text" class="form-control" id="bank" name="bank" required>
                        </div>
            
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection
