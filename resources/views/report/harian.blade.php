@extends('layout.admin')
@section('header', 'Transaksi')

@section('content')
<div class="card card-user" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
    <div class="card-header">
      <h5 class="card-title">Laporan Berdasarkan hari</h5>
    </div>
    <div class="card-body">
      <form method="GET" action="{{ route('generate-harian') }}">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-12 pr-1">
              <div class="form-group">
                <label>Hari</label>
                <input type="date" name="tgl" id="tgl" class="form-control">
            </div>
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