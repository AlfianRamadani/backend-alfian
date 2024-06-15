<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8">
    <span class="brand-text font-weight-light">PFOLIO</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('information.index') }}" class="nav-link">
            <i class="nav-icon fas fa-info"></i>
            <p>Profile Information</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('project.index') }}" class="nav-link">
            <i class="nav-icon fas fa-project-diagram"></i>
            <p>Projects Management</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('education.index') }}" class="nav-link">
            <i class="nav-icon fas fa-school"></i>
            <p>Education Details</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('experience.index') }}" class="nav-link">
            <i class="nav-icon fas fa-briefcase"></i>
            <p>Work Experience</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('social-media.index') }}" class="nav-link">
            <i class="nav-icon fas fa-retweet"></i>
            <p>Social Media Links</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('form.index') }}" class="nav-link d-flex flex-row">
            <i class="nav-icon fas fa-envelope"></i>
            <p>Contact Form Submissions</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-power-off"></i>
            <p>Log out</p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
