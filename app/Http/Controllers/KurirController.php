<?php

namespace App\Http\Controllers;

use App\Models\kurir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KurirController extends Controller
{
    public function index()
    {
        $kurir = kurir::all();
        return view('kurir.index', compact('kurir'));
    }
    public function AddKurir(Request $req)
    {

        $req->validate([
            'nama_kurir' => 'required',
            'no_hp' => 'required',
            'jenis_kurir' => 'required',
        ]);
        try {
            $data = new kurir([
                'nama_kurir' => $req->nama_kurir,
                'no_hp' => $req->no_hp,
                'jenis_kurir' => $req->jenis_kurir,
            ]);
            $data->save();
            return redirect()->route('kurir')->with('success', 'berhasil di tambah');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('kurir')->with('message', 'gagal');
        }
    }
    public function updatekurir(Request $request, $id)
    {

        $validateData = $request->validate([
            'nama_kurir' => 'required',
            'no_hp' => 'required',
            'jenis_kurir' => 'required',
        ]);

        $data = kurir::find($id);

        $data->nama_kurir = $request->nama_kurir;
        $data->no_hp = $request->no_hp;
        $data->jenis_kurir = $request->jenis_kurir;
        $data->save();

        return redirect()->route('kurir')->with('success', 'data berhasil di Edit !');
    }
    public function deletekurir($id)
    {

        $data = kurir::findOrFail($id);
        $data->delete();
        return redirect()->route('kurir')->with('success', 'Data Berhasi Di hapus !');
    }
}
