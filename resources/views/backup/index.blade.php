@extends('layout.admin')
@section('header', 'backup')

@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Backup Database</h4>
              </div>
              <div class="col-md-4">
                    <a href="/backup/create" class="btn btn-primary">backup</a>
                </div>
            </div>
          </div>
@endsection 