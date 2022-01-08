@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <h2 class="m-3 text-bold" style="color: #777777"> Profile </h2>
            <div class="col-12">
                <div class="card p-4 shadow-lg">
                    <div class="container-fluid">
                        <div class="row justify-content-center py-3">
                            <div class="col-md-3">
                                <!-- Profile Image -->
                                <div class="card card-outline"
                                    style="background-image: linear-gradient(to bottom,#005AA7,#FFFDE4)">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ $siswa->getProfil() }}" alt="User profile picture">
                                        </div>
                                        <hr> <br>
                                        <h3 class="profile-username text-center">{{ $siswa->nama_siswa }}</h3>

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
                                                            src="{{ $siswa->getProfil() }}" alt="user image">
                                                        <span class="username" style="color: black">
                                                            {{ $siswa->nama_siswa }}

                                                        </span>
                                                        <span class="description" style="color: black">Siswa</span>
                                                    </div>
                                                    <!-- /.user-block -->
                                                    <ul class="list-unstyled list-justify" style="color: black">
                                                        <li>Jenis Kelamin <span style="float:right">
                                                                {{ $siswa->jenkel }}</span>
                                                        </li>
                                                        <li>Alamat <span style="float:right">{{ $siswa->alamat }}</span>
                                                        </li>
                                                        <li>Tempat lahir <span
                                                                style="float:right">{{ $siswa->tpt_lahir }}</span></li>
                                                        <li>Tanggal lahir <span
                                                                style="float:right">{{ $siswa->tgl_lahir }}</span></li>
                                                        <li>Email <span style="float:right">{{ $siswa->email }}</span></li>
                                                    </ul>
                                                    </p>
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
@endsection
