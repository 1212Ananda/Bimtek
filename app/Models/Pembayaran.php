<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = ['pendaftaran_id', 'user_id', 'jumlah_pembayaran', 'bukti_pembayaran', 'status','kode_billing','tanggal_pembayaran','tanggal_konfirmasi'];
    protected $table = 'pembayaran';

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
