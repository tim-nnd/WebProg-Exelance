@extends('layout/master')

@section('page-title')
Exelance
@endsection

@section('content-title')
    <h1>{{$team->team_name}}</h1>
@endsection

@section('content-body')
<div style="text-align: right">
    <button class="btn btn-icon icon-left btn-primary trigger--fire-modal-2" data-toggle="modal" data-target="#exampleModal" style="border: 1px solid gray"><i class="far fa-user"></i>Member List</button>
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
                            <li class="media" style="border: 1px solid #82968C; padding-bottom:2%; padding:3%; margin-bottom:5%">
                                <a href="{{route('page.teamQuestion',$tm->id)}}" style="text-decoration: none; color: #6A706E"><div class="media-body">
                                    <label class="font-weight-600" style="font-size:125%" >{{$tm->title}}</label>
                                </div></a>
                            </li>
                        @endforeach
                    </ul>
                @endif
                <a href="#" class="btn btn-light float-right" data-toggle="modal" data-target="#questionModal">Post Question</a>
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
                      <?php $ct = 0; ?>
                        @foreach($team->todos->sortBy('deadline') as $td)
                        <a href="{{route('page.teamToDo',$td->id)}}" method="GET" style="">
                            <li class="media" @if($ct+1 != $team->todos->count()) style="border-bottom: 1px solid gray; padding-bottom:2%" @endif>
                                <div class="media-body" style="margin-top: 5%">
                                    <label class="font-weight-600" style="font-size:125%; @if($td->status == 1) color:green @endif" >{{$td->title}}</label>
                                  <br>
                                    <span class="text-small text-muted float-right" >{{$td->deadline}}</span>
                                </div>
                            </li>
                        </a>
                            <?php $ct++; ?>
                        @endforeach
                    </ul>
                @endif
                <a href="#" class="btn btn-light float-right" data-toggle="modal" data-target="#taskModal">Create Task</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
              <h4 style="color:black">Resources<h4>
          </div>
          <div class="card-body">
            @if($team->resources->count() < 1)
            <h5>No Resources Available</h5>
            @else
                <ul class="list-unstyled list-unstyled-border">
                    @foreach($team->resources->sortBy('created_at') as $tr)
                        <li class="media" @if(!($tr == $team->resources->last())) style="border-bottom: 1px solid gray; padding-bottom:2%" @endif>
                            <div class="media-body">
                              <a class="font-weight-600" style="font-size:125%" href="//{{$tr->content}}">{{$tr->title}}</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
            <a href="#" class="btn btn-light float-right" data-toggle="modal" data-target="#resourceModal">Add Resource</a>
          </div>
        </div>
    </div>

    
@endsection

@section('modal')
{{-- Member List --}}
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center">
        <h4 class="modal-title" style="color: black">Member List</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-unstyled list-unstyled-border">
          
            @foreach($team->teamdetails->sortBy('role_id') as $td)
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="{{asset('assets/img/avatar/avatar-1.png')}}" alt="icon">
              <div class="media-body">
                <div class="media-title">{{$td->user->name}}</div>
                <span class="text-small text-muted">{{$td->role->name}}</span>
              </div>
              
              @if($team->teamdetails->where('user_id',Auth::id())->first()->role_id == 1 && $td->user_id != Auth::id())
              <form action="{{route('team.deleteMember',$td->user_id)}}" id="delete{{ $td->user_id }}" method="POST">
                @csrf
                @method('delete')
              <button type="submit" class="btn btn-icon btn-danger" data-toggle="modal" data-target="#confirmModal"><i class="fas fa-times"></i></button></form>
              @endif
            </li>
            @endforeach
        </ul>
      </div>
      <div class="modal-footer">
        <a href="{{route('page.invite')}}" class="btn btn-primary">Invite Member</a>
      </div>
    </div>
  </div>
</div>

{{-- Add Resource --}}
<div class="modal fade" tabindex="-1" role="dialog" id="resourceModal" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center">
        <h4 class="modal-title" style="color: black">Resource</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{ route('team.postResources') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-md-12">
            <input type="text" class="form-control" placeholder="Description" name="description"><br>
            <input type="text" class="form-control" placeholder="Link" name="link" name="link">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

{{-- Post Question --}}
<div class="modal fade" tabindex="-1" role="dialog" id="questionModal" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center">
        <h4 class="modal-title" style="color: black">Post Question</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="{{ route('team.postQuestion') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Title</label>
              <input type="text" class="form-control" name="title"><br>
              <label>Description</label>
              <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Post</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Post Task --}}
<div class="modal fade" tabindex="-1" role="dialog" id="taskModal" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center">
        <h4 class="modal-title" style="color: black">New Task</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('team.postTask') }}" method="POST">
        @csrf
        <div class="form-row">
          <label class="col-md-2" style="color:black; margin-top:2%">Title</label>
          <div class="form-group col-md-10">
            <input type="text" class="form-control" name="title">
          </div>
          <label class="col-md-2" style="color:black; margin-top:2%">Description</label>
          <div class="form-group col-md-10">
            <input type="text" class="form-control" name="content">
          </div>
          <label class="col-md-2" style="color:black; margin-top:2%">Deadline</label>
          <div class="form-group col-md-10">
            <input type="Date" class="form-control" name="deadline" >
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Post</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection