@extends('layout.admin')

@section('content')
<div class="content">
        <div class="row">
            <div class="card">
              <div class="card-header">
                <h5 class="title">outlet</h5>
              </div>
              <div class="card-body">
                <form action="{{route('store-pengguna')}}" method="POST">
                  @csrf
                  <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" value="{{ old('nama') }}" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="" required>
          @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
                  </div>
                  <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="" required>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
                  </div>
                  <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" value="{{ old('password') }}" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="" required>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
                  </div>
                  <div class="mb-3">
                      <label for="role">Role</label>
                      <select class="form-control" name="role" id="role">
                          @foreach ($user as $p)
                          <option value="{{ $p->role }}">{{ $p->role }}</option>
                          @endforeach
                      </select>
          @error('role')
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