<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index(){

        $pelatihans = Pelatihan::all();
        return view('welcome',compact('pelatihans'));
    }

    public function kontak()
    {

        return view('kontak'); 
    }
}
