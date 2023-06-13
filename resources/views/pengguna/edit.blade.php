@extends('layout.admin')
@section('header', 'Pengguna')

@section('content')
<div class="content">
        <div class="row">
            <div class="card">
              <div class="card-header">
                <h5 class="title">pengguna</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="/update-pengguna/{{ $users->id }}">
                  @method('PUT')
                  @csrf
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama</label>
                      <input type="text" class="form-control" name="nama" value="{{ $users->nama }}">
                  </div>
                  <div class="mb-3">  
                      <label for="exampleInputEmail1" class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" value="{{ $users->email }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Password</label>
                      <input type="password" class="form-control" name="password" value="{{ $users->password }}">
                  </div>
                  <div class="mb-3">
                      <label for="type_user">Role</label>
                          <select class="form-control" name="role" id="role">
                              @if(old('role', $users->role) == 'admin')
                                  <option value="admin"selected >Admin</option>
                                  <option value="kasir">Kasir</option>
                                  <option value="owner">Owner</option>
                              @elseif($users->role == 'kasir')
                                  <option value="kasir"selected >Kasir</option>
                                  <option value="owner">Owner</option>
                                  <option value="admin">Admin</option>
                              @elseif($users->role == 'owner')
                                  <option value="owner"selected>Owner</option>
                                  <option value="admin">Admin</option>
                                  <option value="kasir">Kasir</option>
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