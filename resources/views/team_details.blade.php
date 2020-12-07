@extends('layout/master')

@section('page-title')

@endsection

@section('content-title')
    <h1>{{$team->team_name}}</h1>
    
@endsection

@section('content-body')
<div style="text-align: right">
    <a href="#" class="btn btn-icon icon-left btn-lg" style="border: 1px solid gray"><i class="far fa-user"></i> Add Member</a>
</div><br>
<div class="row">
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
            <h4 style="color:black">Team Questions<h4>
        </div>
        <div class="card-body">
            @if($team->meetings->count() < 1)
                <h5>No Question</h5>
                @else
                    <ul class="list-unstyled list-unstyled-border">
                        @foreach($team->meetings as $tm)
                        <a href="{{route('page.teamQuestion',$tm->id)}}" style="text-decoration: none; color: #6A706E">
                            <li class="media" style="border: 1px solid #82968C; padding-bottom:2%; padding:3%; margin-bottom:5%">
                                <div class="media-body">
                                    <label class="font-weight-600" style="font-size:125%">{{$tm->title}}</label>
                                </div>
                            </li>
                        @endforeach
                        </a>
                    </ul>
                @endif
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 style="color:black">Team To-Do<h4>
            </div>
            <div class="card-body">
                @if($team->todos->count() < 1)
                <h5> Currently You Have Nothing To-Do</h5>
                @else
                    <ul class="list-unstyled list-unstyled-border">
                        @foreach($team->todos as $td)
                            <li class="media" @if(!($td == $team->todos->last())) style="border-bottom: 1px solid gray; padding-bottom:2%" @endif>
                                <div class="media-body">
                                    <label class="font-weight-600" style="font-size:125%">{{$td->title}}</label><br>
                                    <span class="text-small text-muted float-right">{{$td->deadline}}</span>
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
              <h4 style="color:black">Resources<h4>
          </div>
          <div class="card-body">
              
          </div>
        </div>
    </div>
@endsection