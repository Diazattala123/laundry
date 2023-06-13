@extends('layout.admin')

@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Restore Table</h4>
              </div>
              <div class="col-md-4">
                    <a href="/outlet" class="btn btn-primary">Kembali</a>
                </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>Id</th>
                    <th>Outlet</th>
                    <th>Detail transaksi</th>
                    <th>Jenis</th>
                    <th>nama_paket</th>
                    <th>Harga</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                      @foreach ($paket as $p)
                      <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->id_outlet}}</td>
                        <td>{{$p->id_detail_transaksi	}}</td>
                        <td >{{$p->jenis}}</td>
                        <td >{{$p->nama_paket	}}</td>
                        <td >{{$p->harga}}</td>
                        <td class="td-actions">
                          <form action="/paket/{{$p->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ url('outlet/restore/'.$p->id) }}"  title="" class="btn btn-info">edit
                            </a>
                            <button type="submit" class="btn btn-danger">Hapus</button>
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