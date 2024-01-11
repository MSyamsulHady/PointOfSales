<?php

namespace App\Http\Controllers;

use App\Models\kurir;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with('produk')->get();
        return view('pesanan.index', compact('pesanan'));
    }
    public function Newpesanan(Request $request, $id)
    {
        // dd($request);
        $produk = Produk::where('id_produk', $id)->first();
        $metode = Pembayaran::where('id_pembayaran')->first();
        $kurir = kurir::where('id_kurir')->first();

        $tanggal = Carbon::now();

        //simpan kedalam database

        $pesanan = new Pesanan();
        $pesanan->id_user = Auth::user()->id_user;
        $pesanan->id_pembayaran = $request->id_pembayaran;
        $pesanan->id_kurir = $request->id_kurir;
        $pesanan->id_produk = $id;
        // $pesanan->stok_produk = $produk->stok_produk - $request->jumlah_pesanan;
        $pesanan->tanggal_pesanan = date('Y-m-d');
        $pesanan->jumlah_pesanan = $request->jumlah_pesanan;
        $pesanan->status = $request->id_pembayaran == 1 ? 'selesai' : 'pending';
        $pesanan->jumlah_bayar = $produk->harga_produk * $request->jumlah_pesanan;
        $pesanan->save();
        return redirect()->route('cashOut');
    }
    public function deletePesanan($id)
    {
        try {
            Pesanan::where('id_pesanan', '=', $id)->delete();
            return redirect('pesanan')->with('success', 'pesanan berhasil di hapus');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('pesanan')->with('success', 'pesanan gagal di hapus');
        }
    }
    public function deletePesananfrond($id)
    {
        try {
            Pesanan::where('id_pesanan', '=', $id)->delete();
            return redirect('home')->with('success', 'pesanan berhasil di hapus');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('home')->with('success', 'pesanan gagal di hapus');
        }
    }


    public function cashOut()
    {
        $pesanan = Pesanan::with('produk', 'pembayaran', 'kurir')->where('id_user', Auth::user()->id_user)->get();
        // dd($pesanan);
        return view('pembayaran.cashOut', [
            'pesanan' => $pesanan
        ]);
    }
    public function bayar()
    {
        $pesan = Pesanan::with('produk', 'pembayaran', 'kurir')->get();
        // dd($pesanan);
        return view('pembayaran.bayar', compact('pesan'));
    }
    public function updtPembayaran(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->status = 'selesai';
        $pesanan->save();
        return redirect()->route('cashOut');
    }
}
