@extends('layout/master')

@section('page-title')
Team Boards
@endsection

@section('content-title')
<h1>Team Boards</h1>
@endsection


@section('content-body')

<!-- team not Available -->
@if($teamdetail->count() < 1) <div class="d-flex flex-wrap justify-content-center">
    <div class="pt-4 pl-4 pr-4 pb-4 container-big">
        <img class="" src="{{url('/assets/img/luar/noTeam.png')}}" alt="">
        <div class="text-center">
            <h3>No Team Available</h3>
        </div>
    </div>
    </div>

    @else

    @foreach($teamdetail as $td)
    <!-- list team -->
    <div class="d-flex flex-wrap justify-content-start">
        <div class="pt-4 pl-4 pr-4 pb-4 container-big border">
            <a href="#" class="links">
                <img class="teamimg" src="{{asset('assets/img/luar/team/'.$td->team->team_img)}}" alt="">
                <div class="text-center teamname">
                    <h3>{{$td->team->team_name}}</h3>
                </div>
            </a>
        </div>
    </div>
    @endforeach
    @endif

    @endsection