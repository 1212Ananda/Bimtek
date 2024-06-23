<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pelatihan_id',
        'jabatan',
        'no_tlp',
        'nama_perusahaan',
        'alamat_perusahaan',
        'no_perusahaan',
        'judul_bimtek',
        'deskripsi_bimtek',
        'spk',
        'biaya',
        'status',
        'ttd_admin',
        'ttd_peserta',
    ];
    protected $table = "pendaftaran";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwalPelatihan()
{
    return $this->hasMany(JadwalPelatihan::class);
}

public function pembayaran()
{
    return $this->hasOne(Pembayaran::class);
}
}
