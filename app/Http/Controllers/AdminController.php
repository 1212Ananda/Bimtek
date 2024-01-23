<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function pendaftaranMenunggu()
    {
        $pendaftaranMenunggu = Pendaftaran::all();

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

}
