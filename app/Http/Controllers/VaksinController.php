<?php

namespace App\Http\Controllers;

use App\Models\Detail_Vaksin;
use App\Models\Vaksin;
use Illuminate\Http\Request;

class VaksinController extends Controller
{
    public function index()
    {
        $vaksin = Vaksin::get();
        return view("vaksin.vaksin", compact('vaksin'));
    }

    public function detail()
    {
        $detail_vaksin = Detail_Vaksin::join("vaksin", "vaksin.id", "=", "detail_vaksin.id_vaksin")
            ->get();
        return view("vaksin.detail_vaksin", compact('detail_vaksin'));
    }

    public function tambah_stok()
    {
        $vaksin = Vaksin::get();
        return view("vaksin.tambah_stok_vaksin", compact('vaksin'));
    }

    public function store_stok(Request $request)
    {
        $detail_vaksin = new Detail_Vaksin();
        $detail_vaksin->id_vaksin = trim($request->id_vaksin);
        $detail_vaksin->sumber_vaksin = $request->sumber_vaksin;
        $detail_vaksin->jumlah = (int)$request->jumlah;
        $detail_vaksin->tanggal = $request->tanggal;
        $detail_vaksin->save();

        $vaksin = Vaksin::find($request->id_vaksin);

        $stok = $vaksin->stok + $request->jumlah;

        $vaksin->stok = $stok;
        $vaksin->save();

        $vaksin = Vaksin::get();
        return redirect()->route('vaksin.detail');
    }

    public function tambah_jenis()
    {
        return view("vaksin.tambah_jenis");
    }

    public function store_jenis(Request $request)
    {
        if(Vaksin::where('nama_vaksin', $request->nama_vaksin)->first() === null){
            $vaksin = new Vaksin();
            $vaksin->nama_vaksin = ucwords(htmlspecialchars(trim($request->nama_vaksin)));;
            $vaksin->stok = 0;
            $vaksin->save();
        }

        return redirect()->route('vaksin');
    }
}
