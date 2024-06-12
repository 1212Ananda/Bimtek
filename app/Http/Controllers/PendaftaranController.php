<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelatihan;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use App\Models\Pelatihan;
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
            'judul_bimtek' => 'nullable|string',
            'deskripsi_bimtek' => 'nullable|string',
            'user_id' => 'required',
            'pelatihan_id' => 'nullable',
            'biaya' => 'nullable'
        ],[
            'jabatan.required' => 'Kolom jabatan wajib diisi.',
            'no_tlp.required' => 'Kolom no. telepon wajib diisi.',
            'nama_perusahaan.required' => 'Kolom nama perusahaan wajib diisi.',
            'alamat_perusahaan.required' => 'Kolom alamat perusahaan wajib diisi.',
            'no_perusahaan.required' => 'Kolom no. telepon perusahaan wajib diisi.'
        ]);
        
        $user = Auth::user();

        $pendaftaranBelumSukses = Pendaftaran::where('user_id', $user->id)
    ->where(function($query) {
        $query->where('status', '!=', 'Disetujui')
              ->where('status', '!=', 'Dibatalkan')
              ->where('status', '!=', 'Ditolak');
    })
    ->exists();
        if ($pendaftaranBelumSukses) {
            return back()->with('error', 'Anda sudah memiliki pendaftaran yang belum berhasil. Harap selesaikan pendaftaran tersebut terlebih dahulu.');
        }
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

        if ($pendaftaran->status !== 'Disetujui' && $pendaftaran->status !== 'Ditolak') {
            $pendaftaran->status = 'Dibatalkan';
            $pendaftaran->save();
        }

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
        $jadwalPelatihan = JadwalPelatihan::whereHas('pendaftaran', function($query) {
            $query->where('user_id', Auth::id());
        })->join('pendaftaran', 'jadwal_pelatihan.pendaftaran_id', '=', 'pendaftaran.id')
          ->with('pendaftaran')
          ->get()
          ->groupBy('pendaftaran.judul_bimtek');
    
        return view('jadwal_pelatihan.index', compact('jadwalPelatihan'));
    }

    public function pendaftaranPaket(Pelatihan $pelatihan){

        return view('pendaftaran.pendaftaranPaket', compact('pelatihan'));
    }

    
}
