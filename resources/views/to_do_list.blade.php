@extends('layout/master')

@section('content-title')
    <h1 style="margin-left:2%">To-Do List</h1>
@endsection

@section('content-body')

<div class="row">
    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
            <h4 style="color:black">Your To-Do List<h4>
        </div>
        <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
                {{-- To-Do --}}
                <li class="media" style="border-bottom: 1px solid gray; padding-bottom:2%">
                    {{-- Contoh Activity To Do --}}
                    <div class="media-body">
                        <label class="font-weight-600" style="font-size:125%">1. Assignment CT</label>
                        <div class="float-right">
                            {{-- Centang --}}
                            <a href="#" class="btn btn-icon btn-success"><i class="fas fa-check rounded-circle"></i></a>
                            {{-- Silang --}}
                            <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times rounded-circle"></i></a>
                        </div><br>
                        <span class="text-small text-muted">4 Desember 2020</span>
                    </div>
                </li>

                <li class="media" style="padding-bottom:2%">
                    {{-- Contoh Activity To Do --}}
                    <div class="media-body">
                        <label class="font-weight-600" style="font-size:125%">2. Project Lab OOAD</label>
                        <div class="float-right">
                            {{-- Centang --}}
                            <a href="#" class="btn btn-icon btn-success"><i class="fas fa-check rounded-circle"></i></a>
                            {{-- Silang --}}
                            <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times rounded-circle"></i></a>
                        </div><br>
                        <span class="text-small text-muted">15 Desember 2020</span>
                    </div>
                </li>
            </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Finished Task</h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled list-unstyled-border">
            <li class="media">
                <img class="mr-3 rounded-circle" width="50" src="{{asset('assets/img/luar/task.jpg')}}" alt="avatar">
                <div class="media-body">
                <div class="float-right text-primary">30/10/2020</div>
                <div class="media-title" style="margin-top:2%">Assignment FLA</div>
                </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection