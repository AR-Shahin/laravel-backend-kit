<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('Backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('Backend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin.dashboard') }}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item @if (navMenuActive(request()->segment(2)))
            menu-open
          @endif "> <!-- menu-open : Dynamic Menu Open-->
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-gear"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.role.') }}" class="nav-link "> <!-- active : for active  -->
                    <i class="fa-solid fa-person-shelter nav-icon" ></i>
                  <p>Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.permission.') }}" class="nav-link ">
                <i class="fa-solid fa-person-dots-from-line nav-icon"></i>
                  <p>Permission</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item @if (navMenuActive(request()->segment(1)))
            menu-open
          @endif"> <!-- menu-open : Dynamic Menu Open-->
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Admins
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="nav-link ">
                    <i class="fa-solid fa-user-tie nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>

            </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="@route('category.index')" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Category</p>
            </a>
          </li>

        </li>
        <li class="nav-item">
            <a href="@route('cache')" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Cache</p>
            </a>
          </li>
        <li class="nav-item">
          <a href="@route('skill.index')" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Skill</p>
          </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.crud.index') }}">
              <i class="nav-icon far fa-circle "></i>
              <p>Crud</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.profile') }}">
                <i class="fa-solid fa-id-badge nav-icon"></i>
              <p>Profile</p>
            </a>
          </li>
          @auth('admin')
          <li class="nav-item">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button class="btn btn-success btn-block">Logout</button>
            </form>
          </li>
          @endauth
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
