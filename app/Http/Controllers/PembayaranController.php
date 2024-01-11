<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('pembayaran.index', compact('pembayaran'));
    }
    public function AddPay(Request $req)
    {
        $req->validate([
            'metode_pembayaran' => 'required'
        ]);
        try {
            $data = new Pembayaran([
                'metode_pembayaran' => $req->metode_pembayaran,
                'nomer_pembayaran' => $req->nomer_pembayaran

            ]);
            $data->save();
            return redirect()->route('pembayaran')->with('success', 'berhasil di tambah');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('pembayaran ')->with('message', 'gagal');
        }
    }
}
