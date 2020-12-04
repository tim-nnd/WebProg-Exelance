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
            @if( $actives->count() < 1 )
                <h1>Currently You Have no Task</h1>
            @endif
            <ul class="list-unstyled list-unstyled-border">
            @foreach ($actives as $t)
              {{-- To-Do --}}
              <li class="media" @if(!($t == $actives->last())) style="border-bottom: 1px solid gray; padding-bottom:2%" @endif>
                  {{-- Contoh Activity To Do --}}
                  <div class="media-body">
                      <label class="font-weight-600" style="font-size:125%">{{$t->name}}</label>
                      <div class="buttons float-right" style="display:flex">
                          {{-- Centang --}}
                          <div style="flex:1">
                          <form action="{{ route('todo.finish',$t->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-icon btn-success" type="submit"><i class="fas fa-check rounded-circle"></i></button>
                          </form></div>
                          {{-- Silang --}}
                          <div style="flex:1">
                          <form action="{{ route('todo.delete',$t->id) }}" id="delete{{ $t->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-icon btn-danger" type="submit"><i class="fas fa-times rounded-circle"></i></button>
                          </form></div>
                      </div><br>
                      <span class="text-small text-muted">{{$t->deadline}}</span>
                  </div>
              </li>
            @endforeach
            </ul>
            {{-- Button untuk Tambahin To Do List --}}
            <div class="float-right">
              <a href="{{route('page.addToDo')}}" class="btn btn-primary">Add To-Do</a>
            </div>
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
            @foreach ($done as $t)
              @if($t->deadline < date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-1,date("Y"))) || $t->status == 1)
              <li class="media">
                  <img class="mr-3 rounded-circle" width="50" src="{{asset('assets/img/luar/task.jpg')}}" alt="avatar">
                  <div class="media-body">
                  <div class="float-right text-primary">{{$t->deadline}}</div>
                  <div class="media-title" style="margin-top:2%">{{$t->name}}</div>
                  </div>
              </li>
              @endif
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection