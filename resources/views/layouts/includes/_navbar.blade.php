<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        @if (auth()->user()->akses == '1')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('guru/pesan') }}">
                    <i class="far fa-comments"></i>
                    {{-- <span class="badge badge-danger navbar-badge">3</span> --}}
                </a>
            </li>
        @elseif (auth()->user()->akses == '2')

            <li class="nav-item">
                <a class="nav-link" href="{{ url('siswa/pesan') }}">
                    <i class="far fa-comments"></i>
                    {{-- <span class="badge badge-danger navbar-badge">3</span> --}}
                </a>
            </li>
        @endif


        <!-- Notifications Dropdown Menu -->
        <!--<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->



        <!-- <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">
          <i class="fa fa-power-off"></i <p>  Out</p>
        </a>
      </li>-->

        <!-- 
        <div class="user-panel d-flex">
          <div class="image">
            <img src="/admin/assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><span>{{ auth()->user()->name }}</span></a>
          </div>
        </div>
      -->

        <li class="nav-item dropdown">
            @php
                if (request()->is('guru*')) {
                    $foto = auth()
                        ->user()
                        ->guru->getProfil();
                } elseif (request()->is('siswa*')) {
                    $foto = auth()
                        ->user()
                        ->siswa->getProfil();
                } elseif (request()->is('admin*')) {
                    $foto = auth()
                        ->user()
                        ->getProfil();
                } else {
                    $foto = '';
                }
            @endphp
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="{{ $foto }}" class="user-image rounded-circle" width="30" alt="User Image">

                <span class="ml-1">{{ Auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item text-center">
                    <img src="{{ $foto }}" class="rounded-circle">

                    <p class="card-text"><small class="text-muted">
                            <span class="hidden-xs">{{ Auth()->user()->name }}</span> Member since :
                            <span>{{ auth()->user()->created_at }}</span></small>
                    </p>
                </a>
                <div class="dropdown-divider"></div>
                <div class="dropdown-item">
                    @if (auth()->user()->akses == '0')
                        <a href="{{ url('admin/password') }}" class="btn btn-success btn-flat float-left">change
                            password</a>
                    @endif

                    <a href="/logout" class="btn btn-danger btn-flat float-right">Log out</a>
                    <div class="clearfix"></div>
                </div>
            </div>
            </a>

            </div>
        </li>

        {{-- <li class="nav-item dropdown user user-menu">
             @php
             if(request()->is('guru*')){
             $foto = auth()->user()->guru->getProfil();
             }elseif(request()->is('siswa*')){
             $foto = auth()->user()->siswa->getProfil();
             }elseif(request()->is('admin*')){
             $foto = auth()->user()->getProfil();
             }else {
             $foto = '';
             }
             @endphp

             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <img src="{{ $foto }}" class="user-image" alt="User Image">
    <span class="hidden-xs text-white">
      <font face="Times New Roman"> {{ Auth()->user()->name }} </font>
    </span>
    </a>
    <ul class="dropdown-menu">
      <!-- User image -->
      <li class="user-header">
        <img src="{{ $foto }}">

        <p class="card-text"><small class="text-muted">
            <span class="hidden-xs">{{ Auth()->user()->name }}</span> Member since :
            <span>{{ auth()->user()->created_at }}</span></small>
        </p>
      </li>


      <!-- Menu Footer-->
      <li class="user-footer">
        @if (auth()->user()->akses == '0')
        <div class="float-left"><a href="{{ url('admin/password') }}" class="btn btn-success btn-flat">change
            password</a></div>
        @endif

        <div class="float-right"><a href="/logout" class="btn btn-danger btn-flat">Log out</a></div>
      </li>
    </ul>
    </li> --}}

    </ul>
</nav>
