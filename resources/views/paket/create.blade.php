@extends('layout.admin')

@section('content')
<div class="content">
        <div class="row">
            <div class="card">
              <div class="card-header">
                <h5 class="title">paket</h5>
              </div>
              <div class="card-body">
                <form action="{{ route('store-paket') }}" method='POST'>
                  @csrf
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <label for="oulet">Outlet</label>
                        <select class="form-control" name="outlet_id" id="outlet">
                          @foreach ($outlet as $p)
                          <option value="{{ $p->id }}">{{ $p->nama }}</option>
                          @endforeach
                        </select> 
                        </div>
                    {{-- <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Outlet</label>
                        <input type="text" class="form-control" name='id_outlet' id="outlet" placeholder="Company" >
                      </div>
                    </div> --}}
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Jenis</label>
                        <select class="form-control" name="jenis" id="jenis">
                            <option value="kiloan">kiloan</option>
                            <option value="selimut">selimut</option>
                            <option value="bed_cover">bed_cover</option>
                            <option value="kaos">kaos</option>
                            <option value="lain-lain">Lain Lain</option>
                      </select>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>nama paket</label>
                        <input type="text" class="form-control" value="{{ old('nama_paket') }}" name='nama_paket' id="nama paket" placeholder="Last Name" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" value="{{ old('harga') }}" name='harga' id="harga" placeholder="Company" >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-primary" >Tambah</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection