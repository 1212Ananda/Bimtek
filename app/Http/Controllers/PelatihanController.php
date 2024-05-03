<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;


class PelatihanController extends Controller
{
        /**
         * index
         *
         * @return View
         * 
         */
        public function index()
        {
         
            $pelatihans = Pelatihan::all();
    
           
            return view('admin.pelatihan.index', compact('pelatihans'));
        }  
        
        public function create() 
        {
            return view('admin.pelatihan.create');
        }

        public function store(Request $request)
        {
            // Validasi data
            $request->validate([
                'judul_bimtek' => 'required|string|max:255',
                'waktu' => 'required|date',
                'biaya' => 'required',
                'kontak' => 'required|string|max:255',
            ]);
    
            // Simpan data ke dalam database
            Pelatihan::create([
                'judul_bimtek' => $request->judul_bimtek,
                'waktu' => $request->waktu,
                'biaya' => $request->biaya,
                'kontak' => $request->kontak,
            ]);
    
            // Redirect dengan pesan sukses
            return redirect()->route('pelatihan.index')->with('success', 'Data bimtek berhasil disimpan.');
        }

        public function edit($id)
    {
        // Temukan data pelatihan berdasarkan ID
        $pelatihan = Pelatihan::findOrFail($id);

        // Kembalikan tampilan formulir edit dengan data pelatihan yang ditemukan
        return view('admin.pelatihan.edit', compact('pelatihan'));
    }

    /**
     * Mengupdate data pelatihan yang telah diubah.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'judul_bimtek' => 'required|string|max:255',
            'waktu' => 'required|date',
            'biaya' => 'required',
            'kontak' => 'required|string|max:255',
        ]);

        // Temukan data pelatihan berdasarkan ID
        $pelatihan = Pelatihan::findOrFail($id);

        // Update data pelatihan dengan data yang diterima dari formulir
        $pelatihan->update([
            'judul_bimtek' => $request->judul_bimtek,
            'waktu' => $request->waktu,
            'biaya' => $request->biaya,
            'kontak' => $request->kontak,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('pelatihan.index')->with('success', 'Data bimtek berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Temukan data pelatihan berdasarkan ID
        $pelatihan = Pelatihan::findOrFail($id);

        // Hapus data pelatihan
        $pelatihan->delete();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data bimtek berhasil dihapus.');
    }
}

       

    


