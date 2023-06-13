<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Models\outlet;
use App\Models\member;
use App\Models\user;
use App\Models\update_history;
use Illuminate\Http\Request;
use App\Models\modelUmum;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transaksi.index')->with([
            'transaksi' => Transaksi::all(),
        ]);
    }

    public function printharian()
    {
        return view('transaksi.printharian')->with([
            'transaksi' => Transaksi::all(),
        ]);
    }

    public function printbulanan()
    {
        return view('transaksi.printbulanan')->with([
            'transaksi' => Transaksi::all(),
        ]);
    }
    
    public function printtahunan()
    {
        return view('transaksi.printtahunan')->with([
            'transaksi' => Transaksi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi.create', [
            'transaksi' => Transaksi::all(),
            'outlet' => outlet::all(),
            'member' => member::all(),
            'user' => User::all(),
            ]);
    }

    public function history() //ubah
    {
        $update_history = update_history::all();
        
        $update_history = $update_history->map(function ($history) {
            $contexts = json_decode($history->context);
            switch ($history->actionType) {
                case modelUmum::ACTION_UPDATE: 
                    // outlet   
                    if (property_exists($contexts->original, 'outlet_id')) {
                        $original_outlet = \App\Models\Outlet::find($contexts->original->outlet_id);
                        $contexts->original->Outlet = $original_outlet->nama;
                        unset($contexts->original->outlet_id);
                    }
                    if (property_exists($contexts->changed, 'outlet_id')) {
                        $changed_outlet = \App\Models\Outlet::find($contexts->changed->outlet_id);
                        $contexts->changed->Outlet = $changed_outlet->nama;
                        unset($contexts->changed->outlet_id);
                    }
                    if (property_exists($contexts->original, 'member_id')) {
                        $original_member = \App\Models\Member::find($contexts->original->member_id);
                        $contexts->original->Pelangan = $original_member->nama;
                        unset($contexts->original->member_id);
                    }
                    if (property_exists($contexts->changed, 'member_id')) {
                        $changed_member = \App\Models\Member::find($contexts->changed->member_id);
                        $contexts->changed->Pelangan = $changed_member->nama;
                        unset($contexts->changed->member_id);
                    }
                    $history->context = json_encode($contexts);
                break;
            }
            return $history;
        });

        return view ('transaksi.history', [
            'update_history' => $update_history
        ]);
    }

    public function cariPembayaranHari()
    {
        return view('transaksi.cari-hari', [
            'transaksi' => Transaksi::all(),
            'user' => User::all(),
            'outlet' => Outlet::all(),
            'member' => Member::all(),
            'user' => User::all(),
        ]);
    }

    public function printPembayaranHari(Request $request)
    {
        $date = $request->input('date', date('Y-m-d'));

        $transaksi = Transaksi::whereDate('created_at', '=', $date)->get();

        return view('transaksi.print-hari', compact('transaksi', 'date'));
    }
    
    public function cariPembayaranBulan()
    {
        return view('transaksi.cari-bulan', [
            'transaksi' => Transaksi::all(),
            'user' => User::all(),
            'outlet' => Outlet::all(),
            'member' => Member::all(),
            'user' => User::all(),
        ]);
    }

    public function printPembayaranBulan(Request $request)
    {
        $date = $request->input('date', date('Y-m-d'));

        $transaksi = Transaksi::whereDate('created_at', '=', $date)->get();

        return view('transaksi.print-bulan', compact('transaksi', 'date'));
    }
    
    public function cariPembayaranTahun()
    {
        return view('transaksi.cari-tahun', [
            'transaksi' => Transaksi::all(),
            'user' => User::all(),
            'outlet' => Outlet::all(),
            'member' => Member::all(),
            'user' => User::all(),
        ]);
    }

    public function printPembayaranTahun(Request $request)
    {
        $date = $request->input('date', date('Y-m-d'));

        $transaksi = Transaksi::whereDate('created_at', '=', $date)->get();

        return view('transaksi.print-tahun', compact('transaksi', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'outlet_id' => 'required',
            'kode_invoice' => 'required',
            'member_id' => 'required',
            'tgl' => 'required',
            'tgl_bayar' => 'required',
            'biaya_tambahan' => 'required',
            'diskon' => 'required',
            'pajak' => 'required',
            'status' => 'required',
            'dibayar' => 'required',
            'user_id' => 'required',
        ]);

        Transaksi::create($validasi);

        return redirect('transaksi')->with('success', 'Data Berhasil di Tambah');
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
    public function edit(Transaksi $transaksi)
    {
        return view('transaksi.edit', [
            'transaksis' => $transaksi,
            'outlet' => Outlet::all(),
            'members' => Member::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute ini tidak boleh kosong!',
            'numeric' => ':attribute harus berupa angka!',
            'integer' => ':attribute harus berupa bilangan bulat!',
            'email' => ':attribute harus mengunakan simbol @',
            'unique' => ':attribute ini sudah ada yang menggunakan'
         ];
         
        $validasi = $request->validate([
            'outlet_id' => 'required',
            'kode_invoice' => 'required',
            'member_id' => 'required',
            'tgl' => 'required',
            'tgl_bayar' => 'required',
            'biaya_tambahan' => 'required',
            'diskon' => 'required',
            'pajak' => 'required',
            'status' => 'required',
            'dibayar' => 'required',
            'user_id' => 'required',
        ], $messages);

        if($validasi) :            
            $update = Transaksi::find($id);
                $update->outlet_id = $request->outlet_id;
                $update->kode_invoice = $request->kode_invoice;
                $update->member_id = $request->member_id;
                $update->tgl = $request->tgl;
                $update->tgl_bayar = $request->tgl_bayar;
                $update->biaya_tambahan = $request->biaya_tambahan;
                $update->diskon = $request->diskon;
                $update->pajak = $request->pajak;
                $update->status = $request->status;
                $update->dibayar = $request->dibayar;
                $update->user_id = $request->user_id;
            $update->save();
              if($update) :
               else :
               endif;
        endif;  
        return redirect('transaksi')->with('success', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi )
    {
        Transaksi::destroy($transaksi->id);

        return redirect('/transaksi')->with('success', 'Data Berhasil di Hapus');
    }
}
