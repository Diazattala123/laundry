<?php

namespace App\Http\Controllers;

use App\Models\paket;
use App\Models\outlet;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        return view('paket.index')->with([
            'paket' => Paket::all(),
        ]);
    }
    public function create()
    {
        return view('paket.create', [
            'paket' => Paket::all(),
            'outlet' => Outlet::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'outlet_id' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required',
        ]);

        Paket::create($validasi);

        return redirect('paket')->with('success', 'Data Berhasil di Tambah');
    }

    public function edit(Paket $paket)
    {
        return view('paket.edit', [
            'pakets' => $paket,
            'outlets' => Outlet::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paket $paket)
    {
        $rules = [
            'outlet_id' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required'
        ];

        $validateData = $request->validate($rules);
        Paket::where('id', $paket->id)->update($validateData);
        return redirect('paket')->with('success', 'Data Berhasil di Edit');
    }

    public function destroy($id)
    {
        $paket = Paket::find($id);
        $paket->delete();

        return back()->with('success','Data Berhasil di hapus');
    }

    public function trash()
    {
        $paket = Paket::onlyTrashed()->get();
        return view('paket.trash', compact(['paket']));
    }

    public function restore($id = null)
    {
        if($id != null) {
            $paket = paket::onlyTrashed()
            ->where('id', $id)
            ->restore();
        } else {
            $paket = Paket::onlyTrashed()->restore();
        }

        return redirect('paket/trash')->with('status', 'paket berhasil di-restore');
    }
}
