@extends('layout.admin')
@section('header', 'dashboard')

@section('content')
<div class="content">
  <div class="row">
    <div class="col-lg-4">
      <div class="card card-chart">
        <div class="card-header">
          <h4 class="card-title">petugas</h4>
        </div>
        <div class="text-center" style="">
          <h4 >{{ $user }}</h4>
          
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="card card-chart">
        <div class="card-header">
          <h4 class="card-title">Outlet</h4>
          <div class="text-center" style="">
            <h4 >{{ $outlet }}</h4>
            
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="card card-chart">
        <div class="card-header">
          <h4 class="card-title">member</h4>
        </div>
        <div class="text-center" style="">
          <h4 >{{ $member }}</h4>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection