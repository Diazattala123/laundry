@extends('layout.admin')
@section('header', 'Pelanggan')

@section('content')
<div class="content">
        <div class="row">
            <div class="card">
              <div class="card-header">
                <h5 class="title">pelanggan</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="/update-pelanggan/{{ $members->id }}">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $members->nama }}">
                    </div>
                    <div class="mb-3">  
                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $members->alamat }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                @if(old('jenis_kelamin', $members->jenis_kelamin) == 'laki-laki')
                                    <option value="laki-laki"selected >Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                @elseif($members->jenis_kelamin == 'perempuan')
                                    <option value="perempuam"selected >Perempuan</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                @endif
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