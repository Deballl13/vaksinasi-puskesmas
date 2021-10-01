<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VaksinasiController extends Controller
{
    public function index(){
        return view("vaksinasi.vaksinasi");
    }

    public function vaksin(){
        return view("vaksinasi.vaksin");
    }
}
