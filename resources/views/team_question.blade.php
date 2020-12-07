@extends('layout/master')
    
@section('page-title')
Team Question
@endsection

@section('content-title')
    <h1>Team Question</h1>
@endsection

@section('content-body')
{{-- Yang Buat --}}
<div class="col-lg-12 col-md-12 col-12 col-sm-12">
    <div class="card">
        <div style="margin: 2%; background-color:#d4d4d4; color: #615d54; padding:1%">
            <div class="row">
                <div style="flex:1; margin-left: 2%"><h5>{{$meeting->title}}</h5></div>
                <div style="flex:1; text-align: right; margin-right: 2%">{{$meeting->created_at}}</div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2 ml-4" style="align-content: center; text-align: center; padding-right: 2%">
                <div><img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" height="100%" width="50%" style="margin-bottom: 2%"></div>
                <div>{{$meeting->user->name}}</div>
                </div>
                <div c;ass="col-lg-12 col-md-12 col-12 col-sm-12" style=" margin-left: 2%"><p>{{$meeting->content}}</p></div>
            </div> 
        </div>
    </div>
</div>

{{-- Yang Bales --}}
@foreach($meeting->meetingdetails as $md)
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <label style="" class="float-right">{{ \Carbon\Carbon::parse($md->created_at)->format('Y-m-j H:i:s') }}</label><br>
                <div class="row">
                    <div class="col-lg-2 ml-4" style="align-content: center; text-align: center; padding-right: 2%">
                    <div><img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" height="100%" width="50%" style="margin-bottom: 2%"></div>
                    <div>{{$md->user->name}}</div>
                    </div>
                    <div style=" margin-left: 2%"><p>{{$md->content}}</p></div>
                </div> 
            </div>
        </div>
    </div>
@endforeach

{{-- Kolom Reply --}}
<form method="POST" action="{{route('team.qnaPostReply',$meeting->id)}}">
    @csrf
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="form-group">
                <label for="exampleFormControlTextarea1">Reply</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="reply"></textarea>
          </div>
          <button class="btn btn-primary float-right" type="submit">Submit</button>
    </div>
</form>
@endsection