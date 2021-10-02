<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VaksinasiController extends Controller
{
    public function index()
    {
        return view("vaksinasi.vaksinasi");
    }

    public function detail()
    {
        return view("vaksinasi.detail_vaksinasi");
    }

    public function edit()
    {
        return view("vaksinasi.edit_vaksinasi");
    }

    public function tambah()
    {
        return view("vaksinasi.tambah_vaksinasi");
    }

    public function vaksin()
    {
        return view("vaksinasi.vaksin");
    }

    public function detail_vaksin()
    {
        return view("vaksinasi.detail_vaksin");
    }

    public function tambah_vaksin()
    {
        return view("vaksinasi.tambah_vaksin");
    }
}
