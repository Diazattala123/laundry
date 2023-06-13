@extends('layout.admin')
@section('header', 'Pelanggan')

@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Table Pelanggan</h4>
              </div>
              <div class="col-md-4">
                    <a href="/create-pelanggan" class="btn btn-primary">Tambah</a>
                </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>id</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis kelamin</th>
                    <th>Created at</th>
                    <th>Updated_at</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                      @foreach ($member as $m)
                      <tr>
                        <td>{{$m->id}}</td>
                        <td>{{$m->nama}}</td>
                        <td >{{$m->alamat}}</td>
                        <td >{{$m->jenis_kelamin}}</td>
                        <td >{{$m->created_at}}</td>
                        <td >{{$m->updated_at}}</td>
                        <td class="td-actions">
                          <form action="{{ route('destroy-pelanggan', $m->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('edit-pelanggan', $m->id) }}"  title="" class="btn btn-info">edit
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