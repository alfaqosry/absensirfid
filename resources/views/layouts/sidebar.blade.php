<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Absensi Karyawan SDN 006</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

          

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item @yield('barang_view')">
                <a class="nav-link collapsed" href="{{route('view_barang')}}" >
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Absensi Saya</span>
                </a>
            </li>
            @if (auth()->user()->role == "Admin")
            <li class="nav-item @yield('index')" >
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseTwo" class="collapse @yield('index_show')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master Data:</h6>
                        <a class="collapse-item @yield('barang')" href="{{route('tasemeter')}}">Absensi </a>
                        {{-- <a class="collapse-item @yield('tasemeter')" href="{{route('tasemeter')}}">Kategori</a> --}}
                    </div>
                </div>
            </li>
            @endif

            <!-- Nav Item - Utilities Collapse Menu -->

            <!-- Divider -->
            @if (auth()->user()->role == "Admin")

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                More
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item @yield('user')">
                <a class="nav-link " href="{{route('pengguna.index')}}">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Users</span></a>
            </li>
            @endif

            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>