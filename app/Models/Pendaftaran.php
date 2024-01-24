<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'nama', 'jabatan', 'pendidikan_terakhir', 'no_tlp', 'nama_perusahaan',
        'alamat_perusahaan', 'no_perusahaan', 'bukti_pembayaran', 'status','surat_permohonan','kode_billing',
        'surat_keputusan','ttd_surat_keputusan','konfirmasi_pembayaran', 'jadwal_pelatihan_id'

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
}
