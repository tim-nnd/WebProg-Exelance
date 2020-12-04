@extends('layout/master')

@section('content-title')
    <h1>Add To Do</h1>
@endsection

@section('content-body')

<div class="row">
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <img src="{{asset('assets/img/luar/addtodo.png')}}" height="100%" width="100%">
    </div>
    <div class="col-lg-6 col-md-12 col-12 col-sm-12" style="margin-top: 8%">
        <form method="POST" action="{{route('todo.add')}}">
        @csrf
        <div class="card card-body">
            <h3 style="text-align: center">To-Do</h3>
            <div class="form-group mb-0">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror<br>
                    <label>Deadline</label>
                    <input type="Date" class="form-control" name="deadline" value="{{old('deadline')}}">
                    @error('deadline')
                        <small class="text-danger">{{$message}}</small>
                    @enderror<br>
                </div>
            </div>
            <button class="btn btn-primary mr-1 float-right" type="submit">Submit</button>
        </div>
        </form>
    </div>
</div>
@endsection