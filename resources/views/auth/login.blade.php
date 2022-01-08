<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Login ELEARNING SMA Negeri 2 Tanjung Jabung Timur</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/assets/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="icon" sizes="76x76" href="{{ asset('/admin/assets/img/logo.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/admin/assets/img/logo.png') }}">
</head>

<body class="hold-transition login-page" style="background-image: url('admin/assets/img/bg1.jpg');
            background-size: cover">
    <!-- WRAPPER -->
    <div class="login-box">
        <div class="card-body">
            <div class="vertical-align-wrap">
                <div class="vertical-align-middle">
                    <div class="middle-box">
                        <div class="login-box">

                            <!-- /.login-logo -->
                            <div class="card">
                                <div class="card-body login-card-body">
                                    <a href="http://localhost:8000">
                                        <div class="logo text-center"> <img src="/admin/assets/img/logo.png"
                                                alt="SMA Logo">
                                        </div>
                                    </a>
                                    <p class="login-box-msg"> Sign in to start </p>
                                    @if (Session::get('pesan'))
                                        <div id="helpId" class="form-text text-danger mb-2 text-center">
                                            {{ Session::get('pesan') }}
                                        </div>
                                    @endif
                                    <form class="form-auth-small" action="/postlogin" method="POST">
                                        <div class="input-group mb-3">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input name="email" type="email" class="form-control" id="signin-email"
                                                value="" placeholder="Email">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="input-group mb-3">
                                            <label for="signin-password" class="control-label sr-only">Password</label>
                                            <input name="password" type="password" class="form-control"
                                                id="signin-password" value="" placeholder="Password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary btn-block float-right">Sign
                                                    In</button>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </form>
                                </div>
                                <!-- /.login-card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->

    <!-- jQuery -->
    <script src="/admin/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin/assets/js/adminlte.min.js"></script>
</body>

</html>
