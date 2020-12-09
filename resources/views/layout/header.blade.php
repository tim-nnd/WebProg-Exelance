<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
      {{-- <div class="search-element">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        
      </div> --}}
    </form>
    <ul class="navbar-nav navbar-right">
    @if(Auth::User())
      <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
          <div class="dropdown-header">Notifications
          </div>
          <div class="dropdown-list-content dropdown-list-icons">
            @if(Auth::User()->notifications->count() < 1)
              <div style="text-align: center">
                <small class="text-muted"> No Notifications Available </small></div>
            @else
              @foreach(Auth::User()->notifications as $n)
                <a href="#" class="dropdown-item dropdown-item-read">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    {{$n->message}}
                  <div class="time text-primary">{{\Carbon\Carbon::parse($n->created_at)->format('j M')}}</div>
                  </div>
                </a>
              @endforeach
            @endif
          </div>
          <div class="dropdown-footer text-center">
            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </li>
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::User()->name}}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
          <a href="" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile <small class="text-muted">(Soon)</small>
          </a>
          {{-- <a href="features-activities.html" class="dropdown-item has-icon">
            <i class="fas fa-bolt"></i> Activities
          </a>
          <a href="features-settings.html" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
          </a> --}}
          <div class="dropdown-divider"></div>
          <a href="{{route('auth.logout')}}" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>
      @else
        <a href="{{route('page.login')}}" class="dropdown-item has-icon">
          <div class="fas fa-sign-in-alt" style="font-size:120%; color:white"> Login</div>
        </a>
      @endif
    </ul>
  </nav>