@extends('layout.admin')

@section('content')
<div class="content">
        <div class="row">
            <div class="card">
              <div class="card-header">
                <h5 class="title">paket</h5>
              </div>
              <div class="card-body">
                <form action="{{route('store-pelanggan')}}" method="POST">
                  @csrf
                  <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" value="{{ old('nama') }}" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="" required>
          @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
                  </div>
                  <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" value="{{ old('alamat') }}" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="" required>
          @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
                  </div>
                  <div class="mb-3">
                      <label for="jenis_kelamin">Jenis Kelamin</label> {{-- ubah --}}
                      <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                          <option value="laki-laki">laki-laki</option>
                          <option value="perempuan">perempuan</option>
                      </select>
          @error('jenis_kelamin')
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