@extends('layout.admin')
@section('header', 'Transaksi')

@section('content')
<div class="card card-user" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
    <div class="card-header">
      <h5 class="card-title">Laporan Berdasarkan Tahunan</h5>
    </div>
    <div class="card-body">
      <form method="GET" action="{{ route('generate-tahunan') }}">
        @csrf
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