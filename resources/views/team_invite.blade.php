@extends('layout/master')

@section('page-title')
Exelance
@endsection

@section('content-title')
    <h1>Invite Member</h1>
@endsection

@section('content-body')
<div class="col-lg-12 col-md-12 col-12 col-sm-12 row">
    <div class="col-lg-3 col-md-12 col-12 col-sm-12 "></div>
    <div class="col-lg-6 col-md-12 col-12 col-sm-12 ">
        <form method="POST" action="{{route('team.invite')}}">
            @csrf
            <div class="card card-body">
                <h3 style="text-align: center">Invite</h3><br>
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @elseif(session('failed'))
                <div class="alert alert-danger">
                    {{session('failed')}}
                </div>
                @endif
                <div class="form-group mb-0">
                    @error('email')
                    <small class="text-danger" style="margin-left: 15%">{{$message}}</small>
                    @enderror
                    <div class="form-group row">
                        <label class="col-md-2 mt-2">Email</label>
                        <input class="form-control col-md-9" type="text" class="form-control" name="email" value="{{old('email')}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 mt-2">Message</label>
                    <input class="form-control col-md-9" type="text" class="form-control" readonly="" name="message" value="{{Auth::User()->name}} invite you to a team">
                        <br>
                    </div>
                </div><br>
                <button class="btn btn-primary mr-1 float-right" type="submit">Send</button>
            </div>
        </form>
    </div>
</div>
@endsection