<?php

namespace App\Http\Controllers;

use App\Models\member;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return view('pelanggan.index')->with([
            'member' => Member::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create', [
            'member' => Member::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $paket = new Member;
        $paket->nama = $request->nama;
        $paket->alamat = $request->alamat;
        $paket->jenis_kelamin = $request->jenis_kelamin;
        $paket->save();

        return redirect('pelanggan')->with('success', 'Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('pelanggan.edit', [
            'members' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ];

        $validateData = $request->validate($rules);
        Member::where('id', $member->id)->update($validateData);
        return redirect('pelanggan')->with('success', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member )
    {
        Member::destroy($member->id);

        return redirect('/pelanggan')->with('success', 'Data Berhasil di Hapus');
    }
}
