<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{route('page.home')}}">Exelance</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{route('page.home')}}">EX</a>
    </div>
    <ul class="sidebar-menu">

      {{-- Dashboard --}}
      <li class="menu-header">Dashboard</li>
      <li class="nav-item ">
        <a href="{{route('page.home')}}" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>

      {{-- Personal Activities --}}
      <li class="menu-header">Personal Activities</li>
      <li class="nav-item">
        <a href="{{route('page.daily')}}" class="nav-link"><i class="fas fa-th-large"></i> <span>Daily Activities</span></a>
      </li>
      <li class="nav-item"><a href="{{route('page.toDo')}}" class="nav-link"><i class="far fa-file-alt"></i> <span>To Do List</span></a></li>

      {{-- Team Activities --}}
      <li class="menu-header">Team Activities</li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Boards</span></a>
        <ul class="dropdown-menu" style="display: none">
          <li><a class="nav-link" href="{{route('boards.team')}}">Teams</a></li>
          <li><a class="nav-link" href="">Resources</a></li>
          <li><a class="nav-link" href="">To Do</a></li>
          <li><a class="nav-link" href="">Meeting Question</a></li>
        </ul>
      </li>
    </ul>
  </aside>
</div>