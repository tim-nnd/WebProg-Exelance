@extends('layout/master')

@section('page-title')
Home
@endsection

@section('content-title')
    <h1>Home</h1>
@endsection

@section('content-body')
<section class="section">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Activity</h4>
            </div>
            <div class="card-body">
              {{$user->activities->count()}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>To-Do List</h4>
            </div>
            <div class="card-body">
                {{$user->todos->count()}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Team Assignment</h4>
            </div>
            <?php $hello = "Hello World!"; ?>
            <?php $teamtodos = 0; ?>
            <div class="card-body">
                @foreach ($user->teamdetails as $ut) 
                    <?php $teamtodos = $teamtodos + $ut->team->todos->where('status',0)->count(); ?>
                @endforeach
                {{$teamtodos}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-circle"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Upcoming Deadline</h4>
            </div>
            <div class="card-body">
                @if($user->todos->where('status',0)->where('deadline','>',today()->addDays('-1'))->count() < 1)
                 -
                @else
                {{ \Carbon\Carbon::parse($user->todos->where('status',0)->where('deadline','>',today()->addDays('-1'))->sortBy('deadline')->first()->deadline)->format('j F') }}
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 style="font-size: 150%">Daily Activity List</h4>
            </div>
            <div class="card-body">
            @if($user->activities->count() == 0)
              <div class="card-body">
                <div style="text-align: center; padding: 20%">
                <p class="text-muted">All Activity Clear</p>
                </div>
              </div>
            @else
              <ul class="list-unstyled list-unstyled-border">
              @foreach ($user->activities->sortBy('time') as $a)
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
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Team Updates</h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
              <?php $ct = 0; ?>
              @foreach($user->teamdetails as $ut)
                @if($ct == 5) @break
                @endif
                @foreach($ut->team->teamupdates->sortByDesc('created_at') as $up)
                  @if($ct == 5) @break
                  @endif
                  <li class="media">
                    <img class="mr-3 rounded-circle" width="50" src="{{asset('assets/img/avatar/avatar-1.png')}}" alt="avatar">
                    <div class="media-body">
                      <div class="float-right text-primary">{{\Carbon\Carbon::parse($up->created_at)->format('j M')}}</div>
                      <div class="media-title">
                      @if(Auth::id() != $user->id) 
                      {{$up->user->name}}
                      @else
                        You
                      @endif
                      </div>
                    <span class="text-small text-muted">{{$up->message}}</span>
                    </div>
                  </li>
                  <?php $ct++; ?>
                @endforeach
              @endforeach
            </ul>
            {{-- <div class="text-center pt-1 pb-1">
              <a href="#" class="btn btn-primary btn-lg btn-round">
                View All
              </a>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
</section>
@endsection