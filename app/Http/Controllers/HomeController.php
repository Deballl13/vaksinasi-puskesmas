<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Vaksin;
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
        $pasien = Pasien::join("vaksinasi", "pasien.nik", "=", "vaksinasi.nik")
                            ->where('vaksinasi.status', 0)
                            ->orWhere('vaksinasi.status', 1)
                            ->count();

        $stok = Vaksin::sum('stok');

        $pasien_vaksinasi = Pasien::join("vaksinasi", "pasien.nik", "=", "vaksinasi.nik")
                            ->where('vaksinasi.status', 2)
                            ->count();
        
        return view('home', compact('pasien', 'stok', 'pasien_vaksinasi'));
    }
}
