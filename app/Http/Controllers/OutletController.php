<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index()
    {
        $outlet = Outlet::all();

        return view('outlet.index')->with([
            'outlet' => Outlet::all(),
        ]);
    }
    public function create()
    {
        return view('outlet.create');
    }

    public function store(Request $request)
    {
        $a = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
        ]);

        $outlet = new outlet;
        $outlet->nama = $request->nama;
        $outlet->alamat = $request->alamat;
        $outlet->tlp = $request->tlp;
        $outlet->save();

        return redirect('/outlet')->with('success','Data Berhasil di Tambah');
    }

    public function edit(Outlet $outlet)
    {
        return view('outlet.edit')->with([
            'outlet' => $outlet
        ]);
    }

    public function update(Request $request, Outlet $outlet)
    {
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
        ];
        
        $validatedData = $request->validate($rules);
        // @dd($outlet->id);

        outlet::where('id', $outlet->id)->update($validatedData);
        return redirect('/outlet')->with('success','Data Berhasil di Edit');
    }

    public function destroy($id)
    {
        $outlet = Outlet::find($id);
        $outlet->delete();

        return back()->with('success','Data Berhasil di hapus');
    }

    public function trash()
    {
        $outlet = Outlet::onlyTrashed()->get();
        return view('outlet.trash', compact(['outlet']));
    }

    public function restore($id = null)
    {
        if($id != null) {
            $outlet = outlet::onlyTrashed()
            ->where('id', $id)
            ->restore();
        } else {
            $outlet = Outlet::onlyTrashed()->restore();
        }

        return redirect('outlet/trash')->with('status', 'outlet berhasil di-restore');
    }
}
