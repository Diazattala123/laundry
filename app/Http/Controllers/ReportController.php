<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function harian()
    {
        return view('report.harian');
    }

    public function generate_harian(Request $request)
    {
        $tanggal = $request->input('tgl');
        $transaksi = Transaksi::whereDate('created_at', $tanggal)->get();

        return view('report.generateHarian', ['transaksi' => $transaksi, 'tanggal' =>$tanggal]);
    }

    public function bulanan()
    {
        return  view('report.bulanan');
    }

    public function generate_bulanan(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        
        $transaksi = DB::table('transaksis')
        ->join('outlets', 'transaksis.outlet_id', '=', 'outlets.id')
        ->join('users', 'transaksis.user_id', '=', 'users.id')
        ->select(
            'transaksis.*',
            'outlets.nama as nama_outlet',
            'users.nama as nama_user',
            DB::raw('MONTH(transaksis.created_at) as bulan_transaksi')
        )
        ->whereMonth('transaksis.created_at', $bulan)
        ->whereYear('transaksis.created_at', $tahun)
        ->get();

        $nama_bulan = Carbon::createFromDate($tahun, $bulan, 1)->locale('id_ID')->monthName;

        return view('report.generateBulanan', ['bulan' => $nama_bulan , 'tahun' => $tahun, 'transaksi' => $transaksi]);
    }

    public function tahunan()
    {
        return view('report.tahunan');
    }

    public function generate_tahunan(Request $request)
    {
        $tahun = $request->input('tahun');

        $transaksi = DB::table('transaksis')
        ->join('outlets', 'transaksis.outlet_id', '=', 'outlets.id')
        ->join('users', 'transaksis.user_id', '=', 'users.id')
        ->select(
            'transaksis.*',
            'outlets.nama as nama_outlet',
            'users.nama as nama_user',
            DB::raw('MONTH(transaksis.created_at) as bulan_transaksi')
        )
        ->whereYear('transaksis.created_at', $tahun)
        ->get();

        return view('report.generateTahunan', ['tahun' => $tahun, 'transaksi' => $transaksi]);
    }
}
