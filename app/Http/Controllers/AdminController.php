<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelatihan;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function approvePendaftaran(Request $request, $id)
{
    
    $request->validate([
        'surat_perjanjian' => 'required|string', 
        'tanda_tangan_base64' => 'required|string',
    ]);

    $pendaftaran = Pendaftaran::findOrFail($id);

    $pendaftaran->spk = $request->surat_perjanjian;

    // Simpan tanda tangan digital admin
    $ttdAdminPath = 'ttd_admin/' . $pendaftaran->id . '.png'; // Misalnya menyimpan ttd admin dalam format gambar
    $ttdAdminBase64 = $request->tanda_tangan_base64;
    $this->saveBase64Image($ttdAdminBase64, $ttdAdminPath); // Method untuk menyimpan base64 ke file

    $pendaftaran->ttd_admin = $ttdAdminPath;

    // Update status pendaftaran
    $pendaftaran->status = 'menunggu kode billing';

    $pendaftaran->save();

    return redirect()->route('admin_pendaftaran')->with('success', 'Pendaftaran berhasil disetujui.');
}

/**
 * Method untuk menyimpan base64 ke file.
 */
private function saveBase64Image($base64Image, $path)
{
    $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
    Storage::disk('public')->put($path, $image);
}

    public function pembayaranKodeBilling()
{
    $pembayaran = Pendaftaran::orderBy('created_at', 'desc')
        ->whereNotNull('spk')
        ->where('status', 'menunggu kode billing') // Menambahkan kondisi status
        ->get();

    return view('admin.pembayaran.kode_billing', ['pembayaran' => $pembayaran]);
}


    public function createKOdeBilling($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        return view('admin.pembayaran.create', ['pendaftaran' => $pendaftaran]);
    }
    public function storeKodeBilling(Request $request, $id)
{
    $data = $request->validate([
        'kode_billing' => 'required',
        'jumlah_pembayaran' => 'required',
        'bank' => 'required', // tambahkan validasi untuk bank
    ]);

    $pendaftaran = Pendaftaran::find($id);

    $pembayaran = new Pembayaran([
        'kode_billing' => $data['kode_billing'],
        'jumlah_pembayaran' => $data['jumlah_pembayaran'],
        'bank' => $data['bank'], // tambahkan bank
        'status' => 'Belum dibayar',
        'user_id' => $pendaftaran->user_id,
    ]);

    $pendaftaran->pembayaran()->save($pembayaran);

    $pendaftaran->status = 'Menunggu Pembayaran'; 
    $pendaftaran->save();

    return redirect()->route('admin_pembayaran')->with('success', 'Kode Billing berhasil dikirimkan ke user');
}



    public function pembayaran()
    {
        $pembayaran = Pembayaran::orderBy('created_at', 'desc')
            ->get();


        return view('admin.pembayaran.index', ['pembayaran' => $pembayaran]);
    }
    public function buktiPembayaranPage()
    {
        $pembayaran = Pembayaran::orderBy('created_at', 'desc')
        ->whereNotNull('bukti_pembayaran')
        ->where('status','Menunggu Konfirmasi Pembayaran admin')
        ->get();

        return view('admin.pembayaran.bukti_pembayaran', ['pembayaran' => $pembayaran]);
    }
    public function jadwalPelatihan()
{
    $jadwalPelatihan = JadwalPelatihan::with('pendaftaran')->get()->groupBy('pendaftaran.judul_bimtek');
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

    public function konfirmasiPembayaran(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pendaftaran = Pendaftaran::firstOrNew(['id' => $pembayaran->pendaftaran_id]);
        
        

        $pembayaran->update([
            'status' => 'pembayaran disetujui',
            'tanggal_konfirmasi' => Carbon::now(),
        ]);

        $pendaftaran->update([
            'status' => 'Disetujui',
        ]);
        return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi');
    }
    
    public function pelatihan()
    {
        return view("admin.pelatihan.index");
    }
    public function users()
    {
        return view("admin.users.index");
    }


    public function tambahJadwalPelatihan(){
  
        $pendaftaran = Pendaftaran::leftJoin('jadwal_pelatihan', function($join) {
            $join->on('pendaftaran.id', '=', 'jadwal_pelatihan.pendaftaran_id');
        })
        ->select('pendaftaran.*')
        ->where('status','Disetujui')
        ->whereNull('jadwal_pelatihan.id')
        ->get();


        return view("admin.jadwal-pelatihan.tambah",compact('pendaftaran'));
    }
}
