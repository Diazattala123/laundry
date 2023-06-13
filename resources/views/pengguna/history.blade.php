@extends('layout.admin')
@section('header', 'History')

@section('content')
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title text-center">HISTORY / LOG PENGGUNA</h4>
    </div>
    <div class="card-body">
      @foreach ($update_history as $history)
        {{-- JSON DECODE --}}
        @php
          $contexts = json_decode($history->context);
        @endphp
      @if ($history->actionType == \App\Models\modelUmum::ACTION_UPDATE)
        @foreach($contexts->changed as $key => $context)
          @if( $key == 'nama' || $key == 'emial' || $key == 'password' || $key == 'role')
          <div class="row">
            <div class="col-lg-6">
              <div class="alert alert-warning">
                <span><b style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;margin-right:10px;">{{$history->actionType}}</b> {{ 'Sebelum Data di update' . '  ' . $key . ' : ' .  $contexts->original->{$key} }}</span>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="alert alert-info">
                <span><b style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;margin-right:10px;">{{$history->actionType}}</b> {{ 'Setelah data di update' . '  ' .$key . ' : ' .  $context }}</span>
              </div>
            </div>
          </div>
          @endif
        @endforeach
        @elseif($history->actionType == \App\Models\modelUmum::ACTION_INSERT)
         @foreach ($contexts as $key => $context)
            @if ($key == 'nama')
                <div class="alert alert-success">
                  <span><b style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;margin-right:10px;">{{$history->actionType}}</b> {{ 'New Data pengguna, Dengan Nama' . ' : ' .  $context }}</span>
                </div>
             @endif
         @endforeach

        @else
          @foreach ($contexts as $key => $context)
              @if ($key == 'nama')
                  <div class="alert alert-danger">
                    <span><b style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;margin-right:10px;">{{$history->actionType}}</b> {{ 'New Data pengguna, Dengan Nama' . ' : ' .  $context }}</span>
                  </div>
              @endif
          @endforeach
      @endif 
      @endforeach
    </div>
  </div>
</div>
@endsection 