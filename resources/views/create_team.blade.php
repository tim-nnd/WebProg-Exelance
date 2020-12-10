@extends('layout/master')

@section('page-title')

@endsection

@section('content-title')
    <h1>Create Team</h1>
@endsection

@section('content-body')
<div class="col-lg-12 col-md-12 col-12 col-sm-12 row">
    <div class="col-lg-3 col-md-12 col-12 col-sm-12 "></div>
    <div class="col-lg-6 col-md-12 col-12 col-sm-12 ">
        <form method="POST" action="{{route('team.createTeam')}}" enctype="multipart/form-data">
            @csrf
            <div class="card card-body">
                <h3 style="text-align: center">Team</h3><br>
                <div class="form-group mb-0">
                    @error('name')
                    <small class="text-danger" style="margin-left: 15%">{{$message}}</small>
                    @enderror
                    <div class="form-group row">
                        <label class="col-md-2 mt-2">Name</label>
                        <input class="form-control col-md-9" type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>
                    @error('img')
                    <small class="text-danger" style="margin-left: 15%">{{$message}}</small>
                    @enderror
                    <div class="form-group row">
                        <label class="col-md-2 mt-2">Image</label>
                        <input class="form-control col-md-9" type="file" class="form-control"  name="img">
                        <br>
                    </div>
                </div><br>
                <button class="btn btn-primary mr-1 float-right" type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection