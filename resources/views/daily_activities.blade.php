@extends('layout/master')

@section('content-title')
    <h1 style="margin-left:2%">Daily Activity</h1>
@endsection

@section('content-body')
<div class="row">
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
            <img src="{{asset('assets/img/luar/dailyHeaderIcon.jpg')}}" height="80%" width="30%" >
            <div class="col">
                <div><h3>Your Daily Activity<h3></div>
                <div><a href="#" class="btn btn-lg btn-dark">New Daily</a></div>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
                {{-- Contoh Daily --}}
                <li class="media">
                    {{-- Contoh Activity --}}
                    <img class="mr-3 rounded-circle" width="50" src="{{asset('assets/img/luar/study.jpg')}}" alt="avatar">
                    <div class="media-body">
                    <div class="float-right text-primary">12.30 PM</div>
                    <div class="media-title">Study</div>
                    {{-- Deskripsi Gatau Mau pake atau ngak --}}
                    <span class="text-small text-muted">Yuk Belajar Yuk</span>
                    </div>
                </li>
            </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Recent Activities</h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled list-unstyled-border">
            <li class="media">
                <img class="mr-3 rounded-circle" width="50" src="{{asset('assets/img/luar/cycling.jpg')}}" alt="avatar">
                <div class="media-body">
                <div class="float-right text-primary">7.00 AM</div>
                <div class="media-title" style="font-size: 150%; margin-top:1.5%">Olahraga</div>
                </div>
            </li>
            <li class="media">
                <img class="mr-3 rounded-circle" width="50" src="{{asset('assets/img/luar/breakfast.jpg')}}" alt="avatar">
                <div class="media-body">
                <div class="float-right text-primary">8.30 AM</div>
                <div class="media-title" style="font-size: 150%; margin-top:1.5%">Breakfast</div>
                </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection