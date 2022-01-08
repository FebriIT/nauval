@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <li aria-hidden="true"> Profile </li>
                        </h3>
                    </div>
                    <div class="container-fluid">
                        <div class="row justify-content-center py-3">
                            <div class="col-md-3">
                                <!-- Profile Image -->
                                <div class="card card-outline"
                                    style="background-image: linear-gradient(to bottom,#005AA7,#FFFDE4)">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ $guru->getProfil() }}" alt="User profile picture">
                                        </div>
                                        <hr> <br>
                                        <h3 class="profile-username text-center">{{ $guru->nama_guru }}</h3>

                                        <p class="text-muted text-center">Online</p><br>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            {{-- <div class="col-md-1"></div> --}}
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><span class="nav-link active font-weight-bold"
                                                    style="font-size: 15px" href="#activity" data-toggle="tab">Info
                                                    Detail</span></li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body"
                                        style="background-image: linear-gradient(to bottom,#005AA7,#FFFDE4)">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="activity">
                                                <!-- Post -->
                                                <div class="post">
                                                    <div class="user-block">
                                                        <img class="img-circle img-bordered-sm"
                                                            src="{{ $guru->getProfil() }}" alt="user image">
                                                        <span class="username" style="color: black">
                                                            {{ $guru->nama_guru }}

                                                        </span>
                                                        <span class="description" style="color: black">Guru</span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <p>
                                                    <ul class="list-unstyled list-justify" style="color: black">
                                                        <li>Jenis Kelamin <span style="float:right">
                                                                {{ $guru->jenkel }}</span>
                                                        </li>
                                                        <li>Alamat <span style="float:right">{{ $guru->alamat }}</span></li>
                                                        <li>Tanggal lahir <span
                                                                style="float:right">{{ $guru->tgl_lahir }}</span></li>
                                                    </ul>
                                                    </p><br>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    {{-- <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-profile">
                    <div class="clearfix">
                        <!-- LEFT COLUMN -->
                        <div class="profile-left">

                            <!-- PROFILE HEADER -->
                            <div class="profile-header">
                                <div class="overlay"></div>
                                <div class="profile-main">
                                    <img width="100" height="100" src="{{ $guru->getProfil() }}" class="img-circle"
                                        alt="Avatar">
                                    <h3 class="name">{{ $guru->nama_guru }}</h3>
                                    <span class="online-status status-available">Online</span>
                                </div>
                                <div class="profile-stat">
                                    <div class="row">
                                        <div class="col-md-4 stat-item">
                                            45 <span>Projects</span>
                                        </div>
                                        <div class="col-md-4 stat-item">
                                            15 <span>Awards</span>
                                        </div>
                                        <div class="col-md-4 stat-item">
                                            2174 <span>Points</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE HEADER -->

                            <!-- PROFILE DETAIL -->
                            <div class="profile-detail">
                                <div class="profile-info">
                                    <h4 class="heading">Data Diri</h4>
                                    <ul class="list-unstyled list-justify">
                                        <li>Jenis Kelamin <span>{{ $guru->jenkel }}</span></li>
                                        <li>Alamat <span>{{ $guru->alamat }}</span></li>
                                        <li>Tanggal lahir <span>{{ $guru->tgl_lahir }}</span></li>
                                        <li>Nomor Handphone <span>{{ $guru->no_tlpn }}</span></li>
                                    </ul>
                                </div>


                            </div>
                            <!-- END PROFILE DETAIL -->
                        </div>
                        <!-- END LEFT COLUMN -->

                        <!-- RIGHT COLUMN -->
                        <div class="profile-right">


                            <!-- TABBED CONTENT -->
                            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                                <ul class="nav" role="tablist">
                                    <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Recent
                                            Activity</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-bottom-left1">
                                    <ul class="list-unstyled activity-timeline">
                                        <li>
                                            <i class="fa fa-comment activity-icon"></i>
                                            <p>Commented on post <a href="#">Prototyping</a> <span class="timestamp">2
                                                    minutes ago</span></p>
                                        </li>
                                        <li>
                                            <i class="fa fa-cloud-upload activity-icon"></i>
                                            <p>Uploaded new file <a href="#">Proposal.docx</a> to project <a href="#">New
                                                    Year Campaign</a> <span class="timestamp">7 hours ago</span></p>
                                        </li>
                                        <li>
                                            <i class="fa fa-plus activity-icon"></i>
                                            <p>Added <a href="#">Martin</a> and <a href="#">3 others colleagues</a> to
                                                project repository <span class="timestamp">Yesterday</span></p>
                                        </li>
                                        <li>
                                            <i class="fa fa-check activity-icon"></i>
                                            <p>Finished 80% of all <a href="#">assigned tasks</a> <span class="timestamp">1
                                                    day ago</span></p>
                                        </li>
                                    </ul>
                                    <div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all
                                            activity</a></div>
                                </div>
                            </div>
                            <!-- END TABBED CONTENT -->
                        </div>
                        <!-- END RIGHT COLUMN -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div> --}}
@endsection
