@extends('layout.admin')
@section('header', 'Transaksi')

@section('content')
<div class="card card-user" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
    <div class="card-header">
      <h5 class="card-title">Laporan Berdasarkan Bulan</h5>
    </div>
    <div class="card-body">
      <form method="GET" action="{{ route('generate-bulanan') }}">
        @csrf
            <div class="col-md-6 col-lg-12 pr-1">
              <div class="form-group">
                <label>Bulan</label>
                <select name="bulan" id="bulan" class="form-control">
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="col-md-6 col-lg-12 pr-1">
              <div class="form-group">
                <label>Tahun</label>
                <input type="text" name="tahun" id="tahun" class="form-control">
            </div>
            </div>
        <div class="row">
          <div class="update mr-auto ml-3">
            <button type="submit" class="btn btn-rounded btn-primary">Cetak</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection