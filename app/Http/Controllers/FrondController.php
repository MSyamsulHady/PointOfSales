<?php

namespace App\Http\Controllers;

use App\Models\Katagori;
use App\Models\kurir;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class FrondController extends Controller
{
    public function index()
    {
        $catagori = Katagori::all();
        $pesan = Pesanan::get();

        return view('frondend.main', compact('catagori', 'pesan'));
    }
    public function produkCatagori($katagori)
    {
        // dd($catagori);
        $produk = Produk::get();
        $metode = Pembayaran::get();
        $kurir = kurir::get();
        $pesan = Pesanan::get();

        $katagoriall = Produk::where('id_katagori', $katagori)->get();



        return view('frondend.produkkatagori', compact('katagoriall', 'kurir', 'metode', 'produk', 'pesan'));
    }
}
