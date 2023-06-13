@extends('layout.admin')

@section('header', 'Paket')

@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Table Paket</h4>
              </div>
              <div class="col-md-4">
                    <a href="/create-paket" class="btn btn-primary">Tambah</a>
                </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>Id</th>
                    <th>Outlet</th>
                    <th>Jenis</th>
                    <th>nama_paket</th>
                    <th>Harga</th>
                    <th>Created at</th>
                    <th>Updated_at</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                      @foreach ($paket as $p)
                      <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->outlet->nama}}</td>
                        <td >{{$p->jenis}}</td>
                        <td >{{$p->nama_paket	}}</td>
                        <td >{{ 'Rp. ' . number_format($p->harga, 0, ',', '.') }}</td>
                        <td >{{$p->created_at}}</td>
                        <td >{{$p->updated_at}}</td>
                        <td class="td-actions">
                          <form action="{{ route('destroy-paket', $p->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('edit-paket', $p->id) }}"  title="" class="btn btn-info">edit
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