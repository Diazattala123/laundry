@extends('layout.admin')

@section('header', 'Outlet')

@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Table Outlet </h4>
              </div>
              <div class="col-md-4">
                    <a href="/outlet/create" class="btn btn-primary">Tambah</a>
                    <a href="/outlet/trash" class="btn btn-primary">restore</a>
                </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>telepon</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                      @foreach ($outlet as $o)
                      <tr>
                        <td>{{$o->id}}</td>
                        <td>{{$o->nama}}</td>
                        <td>{{$o->alamat}}</td>
                        <td >{{$o->tlp}}</td>
                        <td class="td-actions">
                          <form action="/outlet/{{$o->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="/outlet/edit/{{$o->id}}"  title="" class="btn btn-info">edit
                            </a>
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus')" class="btn btn-danger">Hapus</button>
                          </form>
                        </td>
                      </tr> 
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
@endsection 