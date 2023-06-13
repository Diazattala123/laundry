@extends('layout.admin')
@section('header', 'pengguna')

@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Table Pengguna</h4>
              </div>
              <div class="col-md-4">
                    <a href="/create-pengguna" class="btn btn-primary">Tambah</a>
                    <a href="/pengguna/trash" class="btn btn-primary">Restore</a>
                    <a href="{{ route('history-pengguna') }}" class="btn btn-primary">History</a>
                </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Email</th>
                    {{-- <th>password</th>
                    <th>outlet</th> --}}
                    <th>role</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                      @foreach ($user as $p)
                      <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->nama}}</td>
                        <td>{{$p->email}}</td>
                        {{-- <td >{{$p->password}}</td> --}}
                        {{-- <td >{{$p->outlet_id}}</td> --}}
                        <td >{{$p->role}}</td>
                        <td class="td-actions">
                          <form action="{{ route('destroy-pengguna', $p->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('edit-pengguna', $p->id) }}"  title="" class="btn btn-info">edit
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