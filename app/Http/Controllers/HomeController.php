<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countPelatihan = \App\Models\Pelatihan::count();
        $countUsers = \App\Models\User::count();
        $countPendaftaran = \App\Models\Pendaftaran::count();
        $countPembayaran = \App\Models\Pembayaran::count();
        $recentPendaftaran = \App\Models\Pendaftaran::latest()->take(5)->get();
        
        return view('home', compact('countPelatihan', 'countUsers', 'countPendaftaran', 'countPembayaran', 'recentPendaftaran'));
    }
    
}
