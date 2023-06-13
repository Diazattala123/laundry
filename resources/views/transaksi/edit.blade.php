@extends('layout.admin')
@section('header', 'Transaksi')

@section('content')
<div class="content">
        <div class="row">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Trasaksi</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="/update-transaksi/{{ $transaksis->id }}">
                  @method('PUT')
                  @csrf
                   <div class="mb-3">
                      <label for="outlet">Outlet</label>
                          <select class="form-control" name="outlet_id" id="outlet">
                              @foreach ($outlet as $s)
                              @if(old('outlet_id', $transaksis->outlet_id) == $s->id)
                                  <option value="{{ $s->id }}"selected > {{ $s->nama }}</option>
                              @else 
                                  <option value="{{ $s->id }}">{{ $s->nama }}</option>
                              @endif
                              @endforeach
                          </select>
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode Invoice</label>
                      <input type="text" class="form-control" name="kode_invoice" value="{{ $transaksis->kode_invoice }}">
                  </div>
                  <div class="mb-3">
                      <label for="member">Member</label>
                          <select class="form-control" name="member_id" id="member">
                              @foreach ($members as $m)
                              @if(old('member_id', $transaksis->member_id) == $m->id)
                                  <option value="{{ $m->id }}"selected > {{ $m->nama }}</option>
                              @else 
                                  <option value="{{ $m->id }}">{{ $m->nama }}</option>
                              @endif
                              @endforeach
                          </select>
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                      <input type="datetime" class="form-control" name="tgl" value="{{ $transaksis->tgl }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Tanggal Bayar</label>
                      <input type="datetime" class="form-control" name="tgl_bayar" value="{{ $transaksis->tgl_bayar }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Biaya Tambahan</label>
                      <input type="text" class="form-control" name="biaya_tambahan" value="{{ $transaksis->biaya_tambahan }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Diskon</label>
                      <input type="text" class="form-control" name="diskon" value="{{ $transaksis->diskon }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Pajak</label>
                      <input type="text" class="form-control" name="pajak" value="{{ $transaksis->pajak }}">
                  </div>
                   <div class="mb-3">
                      <label for="type_user">Status</label>
                          <select class="form-control" name="status" id="status">
                              @if(old('status', $transaksis->status) == 'baru')
                                  <option value="baru"selected >Baru</option>
                                  <option value="proses">Proses</option>
                                  <option value="selesai">Selesai</option>
                                  <option value="diambil">Diambil</option>
                              @elseif($transaksis->status == 'proses')
                                  <option value="proses"selected>Proses</option>
                                  <option value="selesai">Selesai</option>
                                  <option value="diambil">Diambil</option>
                                  <option value="baru">Baru</option>
                              @elseif($transaksis->status == 'selesai')
                                  <option value="selesai"selected>Selesai</option>
                                  <option value="diambil">Diambil</option>
                                  <option value="baru">Baru</option>
                                  <option value="proses">Proses</option>
                              @elseif($transaksis->status == 'diambil')
                                  <option value="diambil"selected>Diambil</option>
                                  <option value="baru">Baru</option>
                                  <option value="proses">Proses</option>
                                  <option value="selesai">Selesai</option>
                              @endif
                          </select>
                  </div>
                  <div class="mb-3">
                      <label for="type_user">Dibayar</label>
                          <select class="form-control" name="dibayar" id="dibayar">
                              @if(old('dibayar', $transaksis->dibayar) == 'dibayar')
                                  <option value="dibayar"selected >Dibayar</option>
                                  <option value="belum_dibayar">Belum Dibayar</option>
                              @elseif($transaksis->dibayar == 'belum_dibayar')
                                  <option value="belum_dibayar"selected >Belum Dibayar</option>
                                  <option value="dibayar">Dibayar</option>
                              @endif
                          </select>
                  </div>
                  <div class="mb-3">
                      <label for="user">User</label>
                          <select class="form-control" name="user_id" id="user">
                              @foreach ($users as $u)
                              @if(old('user_id', $transaksis->user_id) == $u->id)
                                  <option value="{{ $u->id }}"selected > {{ $u->nama }}</option>
                              @else 
                                  <option value="{{ $u->id }}">{{ $u->nama }}</option>
                              @endif
                              @endforeach
                          </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Edit Data</button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection