@extends('layout.admin')
@section('header', 'paket')

@section('content')
<div class="content">
        <div class="row">
            <div class="card">
              <div class="card-header">
                <h5 class="title">paket</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="/update-paket/{{ $pakets->id }}">
                  @method('PUT')
                  @csrf
                   <div class="mb-3">
                      <label for="outlet">Outlet</label>
                          <select class="form-control" name="outlet_id" id="outlet">
                              @foreach ($outlets as $p)
                              @if(old('outlet_id', $pakets->outlet_id) == $p->id)
                                  <option value="{{ $p->id }}"selected > {{ $p->nama }}</option>
                              @else 
                                  <option value="{{ $p->id }}">{{ $p->nama }}</option>
                              @endif
                              @endforeach
                          </select>
                  </div>
                   <div class="mb-3">
                      <label for="type_user">Jenis</label>
                          <select class="form-control" name="jenis" id="jenis">
                              @if(old('jenis', $pakets->jenis) == 'kiloan')
                                  <option value="kiloan"selected >Kiloan</option>
                                  <option value="selimut">Selimut</option>
                                  <option value="bed_cover">Bed_Cover</option>
                                  <option value="kaos">Kaos</option>
                                  <option value="lain-lain">Lain-Lain</option>
                              @elseif($pakets->jenis == 'selimut')
                                  <option value="selimut"selected >Selimut</option>
                                  <option value="bed_cover">Bed_Cover</option>
                                  <option value="kaos">Kaos</option>
                                  <option value="lain-lain">Lain-Lain</option>
                                  <option value="kiloan">Kiloan</option>
                              @elseif($pakets->jenis == 'bed_cover')
                                  <option value="bed_cover" selected>Bed_Cover</option>
                                  <option value="kaos">Kaos</option>
                                  <option value="lain-lain">Lain-Lain</option>
                                  <option value="kiloan">Kiloan</option>
                                  <option value="selimut">Selimut</option>
                              @elseif($pakets->jenis == 'kaos')
                                  <option value="kaos" selected>Kaos</option>
                                  <option value="lain-lain">Lain-Lain</option>
                                  <option value="kiloan">Kiloan</option>
                                  <option value="selimut">Selimut</option>
                                  <option value="bed_cover">Bed_Cover</option>
                              @elseif($pakets->jenis == 'lain-lain')
                                  <option value="lain-lain" selected>Lain-Lain</option>
                                  <option value="kiloan">Kiloan</option>
                                  <option value="selimut">Selimut</option>
                                  <option value="bed_cover">Bed_Cover</option>
                                  <option value="kaos">Kaos</option>
                              @endif
                          </select>
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama Paket</label>
                      <input type="text" class="form-control" name="nama_paket" value="{{ $pakets->nama_paket }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Harga</label>
                      <input type="number" class="form-control" name="harga" value="{{ $pakets->harga }}">
                  </div>
                  <button type="submit" class="btn btn-primary">Edit Data</button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection