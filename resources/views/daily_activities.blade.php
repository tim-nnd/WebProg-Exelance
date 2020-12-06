@extends('layout/master')

@section('page-title')
Daily Activities
@endsection

@section('content-title')
<h1 style="margin-left:2%">Daily Activity</h1>
@endsection

@section('content-body')
<div class="row">
  <div class="col-lg-6 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <img src="{{asset('assets/img/luar/dailyHeaderIcon.jpg')}}" height="80%" width="30%">
        <div class="col">
          <div>
            <h3>Your Daily Activity<h3>
          </div>
          <div class="row">
            <div style="margin-left:4%"><a href="{{route('page.addDaily')}}" class="btn btn-lg btn-dark">New Daily</a></div>
            <div style="margin-left:2%"><a href="{{route('page.editDaily')}}" class="btn btn-lg btn-danger">Edit Daily</a></div>
          </div>
        </div>
      </div>
      <div class="card-body">
        @if($current->count() < 1) <h3>Nothing left to do</h3>
          @else
          <ul class="list-unstyled list-unstyled-border">
            {{-- Daily Activity --}}
            @foreach($current as $a)
            <li class="media">
              {{-- Contoh Activity --}}
              <img class="mr-3 rounded-circle" width="50" src="{{asset('assets/img/luar/daily/'.$a->photo)}}" alt="icon">
              <div class="media-body">
                <div class="float-right text-primary">{{date('H:i', strtotime($a->time))}} @if($a->time > '12:00') PM @else AM @endif</div>
                <div class="media-title">{{$a->name}}</div>
                @if(session('edit'))
                <form action="{{ route('daily.delete',$a->id) }}" id="delete{{ $a->id }}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-icon btn-danger float-right"><i class="fas fa-times"></i></button></form>
                @endif
                <span class="text-small text-muted">{{$a->description}}</span>
              </div>
            </li>
            @endforeach
          </ul>
          @endif
      </div>
      @if(session('edit')) <a href="{{route('page.finishEdit')}}" class="btn btn-lg btn-success float-right" style="margin:2%">Finish</a> @endif
    </div>
  </div>
  <div class="col-lg-6 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Recent Activities</h4>
      </div>
      <div class="card-body">
        @if($recent->count()<1) <h3>No Recent Activity</h3>
          @else
          <ul class="list-unstyled list-unstyled-border">
            @foreach($recent as $r)
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="{{asset('assets/img/luar/daily/'.$r->photo)}}" alt="avatar">
              <div class="media-body">
                <div class="float-right text-primary">{{date('H:i', strtotime($r->time))}} @if($r->time > '12:00') PM @else AM @endif</div>
                <div class="media-title" style="font-size: 150%; margin-top:1.5%">{{$r->name}}</div>
              </div>
            </li>
            @endforeach
          </ul>
          @endif
      </div>
    </div>
  </div>
</div>
@endsection