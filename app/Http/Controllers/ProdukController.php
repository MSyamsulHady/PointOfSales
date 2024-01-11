<?php

namespace App\Http\Controllers;

use App\Models\Katagori;
use App\Models\Produk;
use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        $katagori = Katagori::with('produk')->get();
        $supplier = supplier::with('produk')->get();
        $produk = Produk::with('katagori')->get();
        // $produk = DB::table('produks')
        //     ->leftJoin('katagoris', 'produks.id_katagori', '=', 'katagoris.id_katagori')
        //     ->select('produks.*', 'katagoris.nama_katagori as nama_katagori')
        //     ->get();
        $title = 'produk';
        return view('produk.index', compact('produk', 'title', 'katagori', 'supplier',));
    }

    public function InsertData(Request $request)
    {
        $data = Produk::create($request->all());
        if ($request->hasFile('image')) {
            $request->file('image')->move('imageProduk/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('produk');
    }

    // function delete produuk
    public function delete($id)

    {

        $data = Produk::findOrFail($id);
        $file = public_path('/imageProduk/') . $data->image;
        if (file_exists($file)) {
            @unlink($file);
        }
        $data->delete();
        return redirect()->route('produk')->with('success', 'Data Berhasi Di hapus !');
    }
}
