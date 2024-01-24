<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelatihan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::with('user')->get();
        
        return view('pendaftaran.index', compact('pendaftarans'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string',
        'jabatan' => 'required|string',
        'pendidikan_terakhir' => 'required|string',
        'no_tlp' => 'required|string',
        'nama_perusahaan' => 'required|string',
        'alamat_perusahaan' => 'required|string',
        'no_perusahaan' => 'required|string',
        'surat_permohonan' => 'required|file|mimes:pdf', // Sesuaikan dengan kebutuhan
    ]);

    $user = Auth::user();

    $surat = null;

if ($request->hasFile('surat_permohonan')) {
    $surat = $request->file('surat_permohonan')->store('surat_permohonan', 'public');
}
  Pendaftaran::create([
        'user_id' => $user->id,
        'nama' => $request->input('nama'),
        'jabatan' => $request->input('jabatan'),
        'pendidikan_terakhir' => $request->input('pendidikan_terakhir'),
        'no_tlp' => $request->input('no_tlp'),
        'nama_perusahaan' => $request->input('nama_perusahaan'),
        'alamat_perusahaan' => $request->input('alamat_perusahaan'),
        'no_perusahaan' => $request->input('no_perusahaan'),
        'surat_permohonan' => $surat,
        'status' => 'pending',
    ]);

    

    return redirect()->route('riwayat_pendaftaran')->with('success', 'Pendaftaran berhasil diajukan! Tunggu konfirmasi admin.');
}



        public function riwayatPendaftaran()
    {
        // Ambil semua data pendaftaran yang terkait dengan pengguna yang saat ini masuk
        $riwayatPendaftaran = Pendaftaran::where('user_id', auth()->user()->id)->get();

        return view('riwayat-pendaftaran', compact('riwayatPendaftaran'));
    }

    public function cancel($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $pendaftaran->delete();

        return redirect()->route('riwayat_pendaftaran')->with('success', 'Pendaftaran berhasil dibatalkan.');
    }

    public function detailPendaftaran($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('pendaftaran.detail', compact('pendaftaran'));
    }

    public function buktiPembayaran(Request $request, $id)
    {
       
        // $request->validate([
        //     'bukti_pembayaran' => 'required|file|mimes:pdf', // Sesuaikan dengan kebutuhan
        //     'ttd_surat_keputusan' => 'required|file', // Sesuaikan dengan kebutuhan
        // ]);

        $pendaftaran = Pendaftaran::findOrFail($id);

        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPembayaranPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
            $pendaftaran->update(['bukti_pembayaran' => $buktiPembayaranPath]);
        }

        if ($request->hasFile('ttd_surat_keputusan')) {
            $ttdSuratKeputusanPath = $request->file('ttd_surat_keputusan')->store('ttd_surat_keputusan', 'public');
            $pendaftaran->update(['ttd_surat_keputusan' => $ttdSuratKeputusanPath]);
        }

        return redirect()->route('riwayat_pendaftaran')->with('success', 'Pembayaran dan surat keputusan berhasil dikirim . silahkan menunggu persetujuan admin');
    }

    public function jadwalPelatihan()
{
     // Mendapatkan pengguna yang login
     $user = Auth::user();

     // Mendapatkan pendaftaran pengguna
     $pendaftaran = $user->pendaftaran;
     if ($pendaftaran) {
         $jadwalPelatihan = $pendaftaran->jadwalPelatihan;
         return view('jadwal_pelatihan.index', compact('jadwalPelatihan'));
     } else {
         return view('jadwal_pelatihan.index', ['jadwalPelatihan' => []]);
     }
}



}
