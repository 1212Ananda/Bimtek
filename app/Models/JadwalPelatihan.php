<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelatihan extends Model
{
    use HasFactory;
    protected $table = 'jadwal_pelatihan';

    protected $fillable = [
        'pendaftaran_id', 'tahap', 'tanggal_pelaksanaan', 'instruktur', 'ruangan','file_pendukung'
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
//     public function jadwalPelatihan()
// {
//     return $this->hasMany(JadwalPelatihan::class);
// }
}
