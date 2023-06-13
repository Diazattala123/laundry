@extends('layout.admin')

@section('content')
<div class="content">
        <div class="row">
            <div class="card">
              <div class="card-header">
                <h5 class="title">outlet</h5>
              </div>
              <div class="card-body">
                <form action="/outlet/create" method='POST'>
                  @csrf
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Nama</label> 
                        <input type="text" class="form-control" name='nama' id="nama" placeholder="Nama">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control"  name='alamat' id="alamat" placeholder="Alamat">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>telepon</label>
                        <input type="text" class="form-control" name='tlp' id="telepon" placeholder="089646325">
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