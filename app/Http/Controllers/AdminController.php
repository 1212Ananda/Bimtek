<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelatihan;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function pendaftaranMenunggu()
    {
        $pendaftaranMenunggu = Pendaftaran::orderBy('created_at', 'desc')->get();

        return view('admin.pendaftaran.index', ['pendaftaranMenunggu' => $pendaftaranMenunggu]);
    }
        public function showDetail($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('admin.pendaftaran.detail', compact('pendaftaran'));
    }

    public function sendToUser(Request $request, $id)
{
    // Validasi form
    $request->validate([
        'kode_billing' => 'required|string',
        'surat_keputusan' => 'required|file|mimes:pdf|max:2048', // Sesuaikan dengan kebutuhan
    ]);

    // Ambil data pendaftaran berdasarkan ID
    $pendaftaran = Pendaftaran::findOrFail($id);

    // Simpan data yang dikirim ke user
    $pendaftaran->kode_billing = $request->input('kode_billing');

    // Simpan surat keputusan
    if ($request->hasFile('surat_keputusan')) {
        $suratKeputusanPath = $request->file('surat_keputusan')->store('surat_keputusan', 'public');
        $pendaftaran->surat_keputusan = $suratKeputusanPath;
    }

    // Update status pendaftaran menjadi "approved"
    $pendaftaran->update([
        'status' => 'approved',
    ]);

    return redirect()->route('admin_pendaftaran')->with('success', 'Data berhasil dikirimkan ke user dan pendaftaran disetujui.');
}

public function pembayaran()
    {
        $pembayaran = Pendaftaran::whereNotNull('bukti_pembayaran')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('admin.pembayaran.index', ['pembayaran' => $pembayaran]);
    }
    public function jadwalPelatihan(){
        $jadwalPelatihan = JadwalPelatihan::all();
        return view('admin.jadwal-pelatihan.index', ['jadwalPelatihan' => $jadwalPelatihan]);

    }

    public function tampilkanFormulirKirimJadwal($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        return view('admin.pembayaran.kirim_jadwal', ['pendaftaran' => $pendaftaran]);
    }

    public function prosesKirimJadwal(Request $request, $id)
{
    $request->validate([
        'hari' => 'required',
        'tanggal' => 'required|date',
        'tempat' => 'required',
        'nama_pelatih' => 'required',
    ]);

    // Ambil user_id dari pendaftaran
    $user_id = Pendaftaran::findOrFail($id)->user_id;

    

    // Cari pendaftaran berdasarkan user_id
    $pendaftaran = Pendaftaran::where('user_id', $user_id)->firstOrFail();
    
    // Kirim jadwal ke pendaftaran yang dipilih
    $jadwalPelatihan = new JadwalPelatihan([
        'hari' => $request->input('hari'),
        'tanggal' => $request->input('tanggal'),
        'tempat' => $request->input('tempat'),
        'nama_pelatih' => $request->input('nama_pelatih'),
        'pendaftaran_id' => $user_id,
    ]);

    // Simpan jadwal pelatihan
    $jadwalPelatihan->save();

    // Perbarui ID jadwal pelatihan pada pendaftaran
    $pendaftaran->update(['jadwal_pelatihan_id' => $jadwalPelatihan->id]);

    // Redirect atau tampilkan pesan sukses
    return redirect('/admin/jadwal-pelatihan')->with('success', 'Jadwal berhasil dikirim.');
}

    public function konfirmasiPembayaran(Request $request, $id, $action)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        // Periksa apakah status pendaftaran adalah 'approved' dan belum dikonfirmasi pembayaran
        if ($pendaftaran->status === 'approved' && !$pendaftaran->konfirmasi_pembayaran) {
            if ($action === 'approve') {
                $pendaftaran->update(['konfirmasi_pembayaran' => true]);
                Session::flash('success', 'Pembayaran disetujui.');

            } elseif ($action === 'reject') {
                Session::flash('success', 'Pembayaran ditolak.');
            }
        } else {
            // Pendaftaran tidak memenuhi syarat untuk dikonfirmasi pembayaran
            Session::flash('error', 'Tidak dapat mengkonfirmasi pembayaran untuk pendaftaran ini.');
        }

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }
public function pelatihan() {
    return view("admin.pelatihan.index");
}
public function users() {
    return view("admin.users.index");
}
}
