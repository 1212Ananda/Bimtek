<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelatihan;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Carbon\Carbon;
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
    $data = $request->validate([
        'jabatan' => 'required|string',
        'no_tlp' => 'required|string',
        'nama_perusahaan' => 'required|string',
        'alamat_perusahaan' => 'required|string',
        'no_perusahaan' => 'required|string',
        'judul_bimtek' => 'required|string',
        'deskripsi_bimtek' => 'required|string',
        'user_id' => 'required',
    ]);

    // Membuat objek Pendaftaran
    $pendaftaran = Pendaftaran::create($data);

    return redirect()->route('detailPendaftaran', $pendaftaran->id)->with('success', 'Pendaftaran berhasil diajukan! Tunggu konfirmasi admin.');
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
        $pembayaran = Pembayaran::firstOrNew(['pendaftaran_id' => $pendaftaran->id]);

        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPembayaranPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
            
            $pembayaran->bukti_pembayaran = $buktiPembayaranPath;
            $pembayaran->status = 'Menunggu Konfirmasi Pembayaran admin';
            $pembayaran->tanggal_pembayaran = Carbon::now();
            $pembayaran->save();
        }
        if ($request->hasFile('spk')) {
            $spkTTD = $request->file('spk')->store('spk', 'public');
            
            $pendaftaran->spk = $spkTTD;
            $pendaftaran->status = 'Menunggu Konfirmasi Surat Keputusan';
            $pendaftaran->save();
        }

    
        return redirect()->back()->with('success', 'Pembayaran dan surat keputusan berhasil dikirim . silahkan menunggu persetujuan admin');
    }

    public function jadwalPelatihan()
{
    // Mendapatkan pengguna yang sedang masuk
    $user = Auth::user();

    $jadwalPelatihan = [];
    if ($user->pendaftaran && $user->pendaftaran->status === 'Disetujui') {
        $jadwalPelatihan = $user->pendaftaran->jadwalPelatihan;
    }

    return view('jadwal_pelatihan.index', compact('jadwalPelatihan'));
}

}
