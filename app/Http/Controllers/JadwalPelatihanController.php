<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelatihan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class JadwalPelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jadwal-pelatihan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pendaftaran_id = $request->input('pendaftaran_id');

    $jadwalData = [];
    foreach ($request->tahap as $key => $value) {
        $jadwalData[] = [
            'pendaftaran_id' => $pendaftaran_id,
            'tahap' => $request->tahap[$key],
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan[$key],
            'instruktur' => $request->instruktur[$key],
            'ruangan' => $request->ruangan[$key],
            'file_pendukung' => 'file pendukung',
        ];
    }

    // Simpan data jadwal ke dalam database
    JadwalPelatihan::insert($jadwalData);

    // Redirect ke halaman yang sesuai
    return redirect()->route('admin_jadwal-pelatihan')->with('success', 'Jadwal pelatihan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($pendaftaran_id)
    {
        $jadwalPelatihan = JadwalPelatihan::where('pendaftaran_id', $pendaftaran_id)->get();

        return view('admin.jadwal-pelatihan.show', compact('jadwalPelatihan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        return view('admin.jadwal-pelatihan.create',compact('pendaftaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
