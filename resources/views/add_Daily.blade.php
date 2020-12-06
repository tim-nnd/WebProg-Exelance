@extends('layout/master')

@section('page-title')
Daily Activities
@endsection

@section('content-title')
<h1>Add Daily Activities</h1>
@endsection

@section('content-body')

<div class="row">
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <form method="POST" action="{{route('daily.add')}}">
            @csrf
            <div class="card card-body">
                <h3 style="text-align: center">Daily Activity</h3>
                <div class="form-group mb-0">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror<br>
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{old('description')}}">
                        @error('description')
                        <small class="text-danger">{{$message}}</small>
                        @enderror<br>
                        <label>Time</label>
                        <input type="time" class="form-control" name="time" value="{{old('time')}}">
                        @error('time')
                        <small class="text-danger">{{$message}}</small>
                        @enderror<br>
                        <div class="form-group">
                            <label>Categories</label>
                            <select class="custom-select" name="category">
                                <option selected="" value="">Choose Category</option>
                                <option value="breakfast.jpg">Breakfast</option>
                                <option value="lunch.jpg">Lunch</option>
                                <option value="dinner.jpg">Dinner</option>
                                <option value="hygiene.jpg">Hygiene</option>
                                <option value="rest.jpg">Rest</option>
                                <option value="study.jpg">Study</option>
                                <option value="football.jpg">Football</option>
                                <option value="basketball.jpg">Basketball</option>
                                <option value="videogame.jpg">Video Game</option>
                                <option value="cycling.jpg">Cycling</option>
                                <option value="jogging.jpg">Jogging</option>
                                <option value="gym.jpg">Gym</option>
                                <option value="reading.jpg">Reading Book</option>
                            </select>
                            @error('category')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary mr-1 float-right" type="submit">Submit</button>
            </div>
        </form>
    </div>
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <img src="{{asset('assets/img/luar/addDaily.png')}}" height="100%" width="100%">
    </div>
</div>
@endsection