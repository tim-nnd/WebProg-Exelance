@extends('layout/master')

@section('page-title')
Exelance
@endsection

@section('content-title')
    <h1>Team To-Do</h1>
@endsection

@section('content-body')
<div class="col-lg-12 col-md-12 col-12 col-sm-12">
    <div class="card">
        <div style="margin: 2%">
            <div class="row">
                <div style="flex:1; margin-left: 2%"><h4>{{$tToDo->title}}@if($tToDo->status == 1)<small class="text-success">  (Finished)</small>@endif</h4></div>
                <div style="flex:1; text-align: right; margin-right: 2%">{{$tToDo->deadline}}</div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div style=" margin-left: 2%"><p>{{$tToDo->content}}</p></div>
            </div>
            @if($tToDo->status != 1)
            <div class="float-right row">
                <a href="{{route('team.finishTask',$tToDo->id)}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i>Finish</a>
                @if($tToDo->team->teamdetails->where('user_id',Auth::id())->first()->role_id == 1)
                <form action="{{route('team.deleteTask',$tToDo->id)}}" id="delete{{ $tToDo->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-icon icon-left btn-danger ml-4"><i class="fas fa-times"></i>Remove</button>
                </form>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>
@endsection