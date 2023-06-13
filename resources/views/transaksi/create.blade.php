@extends('layout.admin')

@section('content')
<div class="content">
        <div class="row">
            <div class="card">
              <div class="card-header">
                <h5 class="title">paket</h5>
              </div>
              <div class="card-body">
                <form action="{{route('store-transaksi')}}" method="POST">
                  @csrf
                  <div class="mb-3">
                      <label for="oulet">Outlet</label>
                        <select class="form-control" name="outlet_id" id="outlet">
                          @foreach ($outlet as $s)
                          <option value="{{ $s->id }}">{{ $s->nama }}</option>
                          @endforeach
                        </select>
          @error('outlet_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror 
            </div>
            <div class="mb-3">
                      <label for="kode_invoice" class="form-label">Kode Invoice</label>
                      <input type="text" value="{{ old('kode_invoice') }}" name="kode_invoice" class="form-control @error('kode_invoice') is-invalid @enderror" id="kode_invoice" placeholder="" required>
          @error('kode_invoice')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
            </div>
                  <div class="mb-3">
                      <label for="member">Member</label>
                        <select class="form-control" name="member_id" id="member">
                          @foreach ($member as $m)
                          <option value="{{ $m->id }}">{{ $m->nama }}</option>
                          @endforeach
                        </select>
          @error('member_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror 
            </div>
            <div class="mb-3">
                      <label for="tgl" class="form-label">Tanggal</label>
                      <input type="date" value="{{ old('tgl') }}" name="tgl" class="form-control @error('tgl') is-invalid @enderror" id="tgl" placeholder="" required>
          @error('tgl')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
            </div>
            <div class="mb-3">
                      <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
                      <input type="date" value="{{ old('tgl_bayar') }}" name="tgl_bayar" class="form-control @error('tgl_bayar') is-invalid @enderror" id="tgl_bayar" placeholder="" required>
          @error('tgl_bayar')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
            </div>
            <div class="mb-3">
                      <label for="biaya_tambahan" class="form-label">Biaya Tambahan</label>
                      <input type="number" value="{{ old('biaya_tambahan') }}" name="biaya_tambahan" class="form-control @error('biaya_tambahan') is-invalid @enderror" id="biaya_tambahan" placeholder="" required>
          @error('biaya_tambahan')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
            </div>
            <div class="mb-3">
                      <label for="diskon" class="form-label">Diskon</label>
                      <input type="text" value="{{ old('diskon') }}" name="diskon" class="form-control @error('diskon') is-invalid @enderror" id="diskon" placeholder="" required>
          @error('diskon')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
            </div>
            <div class="mb-3">
                      <label for="pajak" class="form-label">Pajak</label>
                      <input type="text" value="{{ old('pajak') }}" name="pajak" class="form-control @error('pajak') is-invalid @enderror" id="pajak" placeholder="" required>
          @error('pajak')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
            </div>
            <div class="mb-3">
                      <label for="status">Status</label> {{-- ubah --}}
                      <select class="form-control" name="status" id="status">
                          <option value="baru">baru</option>
                          <option value="proses">proses</option>
                          <option value="selesai">selesai</option>
                          <option value="diambil">diambil</option>
                      </select>
          @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror 
            </div>
            <div class="mb-3">
                      <label for="dibayar">Dibayar</label> {{-- ubah --}}
                      <select class="form-control" name="dibayar" id="dibayar">
                          <option value="dibayar">Sudah Bayar</option>
                          <option value="belum_dibayar">Belum Bayar</option>
                      </select>
          @error('dibayar')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror 
            </div>
            <div class="mb-3">
                      <label for="user">User</label>
                        <select class="form-control" name="user_id" id="user">
                          @foreach ($user as $u)
                          <option value="{{ $u->id }}">{{ $u->nama }}</option>
                          @endforeach
                        </select>
          @error('user_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror 
            </div>
                  <button type="submit" class="btn btn-primary">Tambah Data</button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection