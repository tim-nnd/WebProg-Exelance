@extends('layout/master')

@section('page-title')
    Exelance
@endsection

@section('content-title')
    <h1>Invitation</h1>
@endsection

@section('content-body')
<div class="col-lg-12 col-md-12 col-12 col-sm-12 row">
    <div class="col-lg-3 col-md-12 col-12 col-sm-12 "></div>
    <div class="col-lg-6 col-md-12 col-12 col-sm-12 ">
        <div class="card card-body" style="text-align: center">
            <h4>{{$invitation->message}}</h4>
            <img src="{{asset('assets/img/luar/team/'.$invitation->team->team_img)}}" height="300px" width="250px" style="margin-left: 25%">
            <h5>{{$invitation->team->team_name}}</h5><br>
            <div>
                <a href="{{route('team.accept',$invitation->id)}}" class="btn btn-success mr-1 col-lg-3" type="submit">Accept</a>
                <a href="{{route('team.decline',$invitation->id)}}" class="btn btn-danger mr-1 col-lg-3" type="submit">Decline</a>
            </div>
        </div>
    </div>
</div>
@endsection