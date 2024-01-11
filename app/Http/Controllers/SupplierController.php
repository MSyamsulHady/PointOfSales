<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = supplier::all();
        return view('supplier.index', compact('supplier'));
    }
    public function AddSupplier(Request $req)
    {
        $req->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'contact' => 'required',
        ]);
        try {
            $data = new Supplier([
                'nama_supplier' => $req->nama_supplier,
                'alamat' => $req->alamat,
                'contact' => $req->contact,
            ]);
            $data->save();
            return redirect()->route('supplier')->with('success', 'berhasil di tambah');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('supplier')->with('message', 'gagal');
        }
    }
    public function UpdtSupplier(Request $req, $id)
    {
        $validateData = $req->validate([
            'nama_supplier' => 'required',
            'alamat' => 'required',
            'contact' => 'required'
        ]);

        $data = supplier::find($id);

        $data->nama_supplier = $req->nama_supplier;
        $data->alamat = $req->alamat;
        $data->contact = $req->contact;
        $data->save();

        return redirect()->route('supplier')->with('success', 'data berhasil di Edit !');
    }
    public function DeleteSupplier($id)
    {
        try {
            Supplier::where('supplier_id', '=', $id)->delete();
            return redirect('supplier')->with('success', 'berhasil di hapus');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('supplier')->with('message', 'gagal');
        }
    }
}
