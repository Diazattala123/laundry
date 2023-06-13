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
                    <a href="/pengguna" class="btn btn-primary">Kembali</a>
                </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                        th>Id</th>
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
                          <form action="/pengguna/{{$p->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ url('pengguna/restore/'.$p->id) }}"  title="" class="btn btn-info">restore
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