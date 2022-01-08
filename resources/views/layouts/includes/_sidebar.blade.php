@php
if (auth()->user()->akses == '0') {
    $foto = auth()
        ->user()
        ->getProfil();
    $url = 'admin/profil';
} elseif (auth()->user()->akses == '1') {
    $foto = auth()
        ->user()
        ->guru->getProfil();
    $url = 'guru/profil';
} elseif (auth()->user()->akses == '2') {
    $foto = auth()
        ->user()
        ->siswa->getProfil();
    $url = 'siswa/profil';
}
@endphp

<aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('/admin/assets/img/logo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">MTSN 3 Muaro Jambi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ $foto }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ url($url) }}" class="d-block font-weight-bold">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                @if (auth()->user()->akses == '0')
                    <li class="nav-item">
                        <a href="{{ url('admin/dashboard') }}"
                            class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/guru/index') }}"
                            class="nav-link {{ request()->is('admin/guru*') ? 'active' : '' }}">
                            <i class="fa fa-book nav-icon" aria-hidden="true"></i>

                            <p>
                                Guru
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/siswa/index') }}"
                            class="nav-link {{ request()->is('admin/siswa*') ? 'active' : '' }}">
                            <i class="fa fa-book nav-icon" aria-hidden="true"></i>

                            <p>
                                Siswa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/kelas/index') }}"
                            class="nav-link {{ request()->is('admin/kelas*') ? 'active' : '' }}">
                            <i class="fa fa-book nav-icon" aria-hidden="true"></i>

                            <p>
                                Kelas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/mapel/index') }}"
                            class="nav-link {{ request()->is('admin/mapel*') ? 'active' : '' }}">
                            <i class="fa fa-book nav-icon" aria-hidden="true"></i>

                            <p>
                                MataPelajaran
                            </p>
                        </a>
                    </li>
                @elseif(auth()->user()->akses == '1')
                    <li class="nav-item">
                        <a href="{{ url('guru/home') }}"
                            class="nav-link {{ request()->is('guru/home') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('guru/materi/index') }}"
                            class="nav-link {{ request()->is('guru/materi/index') ? 'active' : '' }}">
                            <i class="fa fa-book nav-icon" aria-hidden="true"></i>
                            <p>
                                Materi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('guru/tugas*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('guru/tugas*') ? 'active' : '' }}">
                            <i class="fa fa-book nav-icon" aria-hidden="true"></i>

                            <p>
                                Manajemen Tugas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('guru/tugas/index') }}"
                                    class="nav-link {{ request()->is('guru/tugas/index') ? 'active' : '' }}">
                                    <i class="fas fa-book-open nav-icon   "></i>
                                    <p>Tugas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('guru/tugass/index') }}"
                                    class="nav-link {{ request()->is('guru/tugass/index') ? 'active' : '' }}">
                                    <i class="fas fa-book-open nav-icon   "></i>

                                    <p>Tugas Yang Dikerjakan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('guru/kuis*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('guru/kuis*') ? 'active' : '' }}">
                            <i class="fa fa-book nav-icon" aria-hidden="true"></i>
                            <p>
                                Manajemen Kuis
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('guru/kuis/index') }}"
                                    class="nav-link {{ request()->is('guru/kuis/index') ? 'active' : '' }}">
                                    <i class="fas fa-book-open nav-icon   "></i>
                                    <p>Kuis</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('guru/kuiss/index') }}"
                                    class="nav-link {{ request()->is('guru/kuiss/index') ? 'active' : '' }}">
                                    <i class="fas fa-book-open nav-icon   "></i>
                                    <p>Kuis Yang Dikerjakan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('guru/kelasguru/index') }}"
                            class="nav-link {{ request()->is('guru/kelasguru/index') ? 'active' : '' }}">
                            <i class="fa fa-book nav-icon" aria-hidden="true"></i>
                            <p>
                                Kelas
                            </p>
                        </a>
                    </li>
                @elseif(auth()->user()->akses == '2')
                    <li class="nav-item">
                        <a href="{{ url('admin/dashboard') }}"
                            class="nav-link {{ request()->is('siswa/homee') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('siswa/materisiswa/index') }}"
                            class="nav-link {{ request()->is('siswa/materisiswa*') ? 'active' : '' }}">
                            <i class="fa fa-book nav-icon" aria-hidden="true"></i>

                            <p>
                                Materi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('siswa/tugassiswa/index') }}"
                            class="nav-link {{ request()->is('siswa/tugassiswa*') ? 'active' : '' }}">
                            <i class="fa fa-book nav-icon" aria-hidden="true"></i>

                            <p>
                                Tugas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('siswa/kuissiswa/index') }}"
                            class="nav-link {{ request()->is('siswa/kuissiswa*') ? 'active' : '' }}">
                            <i class="fa fa-book nav-icon" aria-hidden="true"></i>

                            <p>
                                Kuis
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item mt-5">
                    <a href="{{ url('logout') }}" class="nav-link  bg-danger">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
