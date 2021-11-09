<div class="main-sidebar">
    <aside id="sidebar-wrapper">
          <br>
          <br>
          <div class="sidebar-brand">
            <a href="index.html"><h6 class="text-dark">D.Paragon Store</h6></a>
          </div>
          <br>
          <br>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">Menu</a>
          </div>
          <ul class="sidebar-menu">
            <!-- <li class="btn btn-primary" class="menu-header">Selamat Datang {{ Auth::user()->name }}</li>
            <li class="btn btn-primary" class="menu-header">Anda Login Sebagai : {{ Auth::user()->role }}</li> -->
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
              <a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
             <li class="nav-item dropdown {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
              <a class="nav-link" href="/user/editprofile"><i class="fas fa-user"></i> <span>Edit Profil</span></a>
            </li>
			      @if(Auth::user()->role == 'admin')
            <li class="menu-header">Menu Utama</li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'user' ? 'active' : '' }}">
              <a class="nav-link" href="/user"><i class="fas fa-users"></i> <span>User</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'penjualan' ? 'active' : '' }}">
              <a class="nav-link" href="/penjualan"><i class="fas fa-user-tie"></i> <span>Penjualan</span></a>
            </li>
             @endif
              @if(Auth::user()->role == 'customer')
            <li class="menu-header">Menu Utama</li>
           
            <li class="nav-item dropdown {{ Request::segment(1) === 'penjualan' ? 'active' : '' }}">
              <a class="nav-link" href="/penjualan/user"><i class="fas fa-user-tie"></i> <span>Penjualan</span></a>
            </li>
             @endif
           
          </ul>
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="{{ route('logout') }}" class="btn btn-primary btn-lg btn-block btn-icon-split"
              onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                {{csrf_field()}}
              </form>
          </div>
    </aside>
</div>