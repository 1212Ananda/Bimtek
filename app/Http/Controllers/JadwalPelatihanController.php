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

            $file = $request->file('file_pendukung')[$key]->store('jadwal_pelatihan', 'public');
    
            $jadwalData[] = [
                'pendaftaran_id' => $pendaftaran_id,
                'tahap' => $request->tahap[$key],
                'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan[$key],
                'instruktur' => $request->instruktur[$key],
                'ruangan' => $request->ruangan[$key],
                'file_pendukung' => $file, 
            ];
        }
    
        JadwalPelatihan::insert($jadwalData);
    
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
        $jadwalPelatihan = JadwalPelatihan::all();
        $pendaftaran = Pendaftaran::find($id);
        return view('admin.jadwal-pelatihan.create',compact('pendaftaran','jadwalPelatihan'));
    }
    public function editPelatihan($pendaftaran_id)
    {
        $jadwalPelatihan = JadwalPelatihan::where('pendaftaran_id', $pendaftaran_id)->get();
        $pendaftaran = Pendaftaran::find($pendaftaran_id);
        return view('admin.jadwal-pelatihan.edit', compact('jadwalPelatihan', 'pendaftaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $pendaftaran_id)
{
    $jadwalPelatihan = JadwalPelatihan::where('pendaftaran_id', $pendaftaran_id)->get();

    // Hapus jadwal yang ada
    foreach ($jadwalPelatihan as $jadwal) {
        $jadwal->delete();
    }

    // Tambah atau perbarui jadwal baru
    foreach ($request->tahap as $index => $value) {
        if (isset($request->file_pendukung[$index])) {
            $file = $request->file('file_pendukung')[$index]->store('jadwal_pelatihan', 'public');
        } else {
            $file = $request->existing_file_pendukung[$index] ?? null;
        }

        JadwalPelatihan::create([
            'pendaftaran_id' => $pendaftaran_id,
            'tahap' => $request->tahap[$index],
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan[$index],
            'instruktur' => $request->instruktur[$index],
            'ruangan' => $request->ruangan[$index],
            'file_pendukung' => $file,
        ]);
    }

    return redirect()->route('jadwal-pelatihan.show', $pendaftaran_id)->with('success', 'Jadwal pelatihan berhasil diperbarui');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
