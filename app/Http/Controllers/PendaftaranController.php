<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index(){
        return view("pendaftaran.pendaftaran");
    }

    public function detail(){
        return view("pendaftaran.persetujuan");
    }
}
