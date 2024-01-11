<?php

namespace App\Http\Controllers;

use App\Models\Katagori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatagoriController extends Controller
{
    public function index()
    {
        $katagori = DB::table('katagoris')->get();

        return view('katagori.index', compact('katagori'));
    }
    // function tambah data katagoei

    public function store(Request $request)
    {
        $data = Katagori::create($request->all());
        if ($request->hasFile('image')) {
            $request->file('image')->move('imagekatagori/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('katagori');
    }
    // function update katagori
    public function update(Request $request, $id)
    {

        $validateData = $request->validate([
            'nama_katagori' => 'required'
        ]);

        $data = Katagori::find($id);

        $data->nama_katagori = $request->nama_katagori;
        $data->save();

        return redirect()->route('katagori')->with('success', 'data berhasil di Edit !');
    }

    // function delete katagori
    public function deleteKatagori($id)
    {

        $data = Katagori::findOrFail($id);
        $file = public_path('/imagekatagori/') . $data->image;
        if (file_exists($file)) {
            @unlink($file);
        }
        $data->delete();
        return redirect()->route('katagori')->with('success', 'Data Berhasi Di hapus !');
    }
}
