@extends('layout.admin')
@section('header', 'Transaksi')

@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Table Transaksi</h4>
              </div>
              <div class="col-md-4">
                    <a href="/create-transaksi" class="btn btn-primary">Tambah</a>
                    <a href="/history" class="btn btn-primary">History</a>
                    {{-- <a href="{{ route('transaksi.printharian', ['from' => $from, 'to' => $to]) }}" class="btn btn-primary">print</a> --}}
                </div>  
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>No</th>
                    <th>Outlet</th>
                    <th>Kode Invoice</th>
                    <th>Member</th>
                    <th>Tanggal</th>
                    <th>Tanggal Bayar</th>
                    <th>Biaya Tambahan</th>
                    <th>Diskon</th>
                    <th>Pajak</th>
                    <th>Status</th>
                    <th>Dibayar</th>
                    <th>User</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                      @foreach ($transaksi as $t)
                      <tr>
                        <td>{{$t->id}}</td>
                        <td>{{ $t->outlet_id }}</td>
                        <td>{{ $t->kode_invoice }}</td>
                        <td>{{ $t->member->nama }}</td>
                        <td>{{ $t->tgl}}</td>
                        <td>{{ $t->tgl_bayar }}</td>
                        <td>{{ $t->biaya_tambahan }}</td>
                        <td>{{ $t->diskon }}</td>
                        <td>{{ $t->pajak }}</td>
                        <td>{{ $t->status }}</td>
                        <td>{{ $t->dibayar }}</td>
                        <td>{{ $t->user->nama}}</td>
                        
                        <td class="td-actions">
                          <form action="{{ route('destroy-transaksi', $t->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('edit-transaksi', $t->id) }}"  title="" class="btn btn-info">edit
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