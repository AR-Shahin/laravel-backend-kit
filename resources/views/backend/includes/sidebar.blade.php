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
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item "> <!-- menu-open : Dynamic Menu Open-->
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
                  <i class="fa fa-user nav-icon"></i>
                  <p>Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.permission.') }}" class="nav-link ">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Permission</p>
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
              <i class="nav-icon fa fa-user "></i>
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
