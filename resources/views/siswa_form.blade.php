@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><b>TAMBAH SISWA</b></div>
                            <br>
                            <div class="card-body">
                                {{ Form::model($obj, ['action' => $action, 'files' => true, 'method' => $method, 'enctype' => 'multipart/form-data']) }}
                                <div class="form-group">
                                    {{ Form::label('id', 'NIS *') }}
                                    {{ Form::text('id', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('id') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('nama_siswa', 'NAMA SISWA *') }}
                                    {{ Form::text('nama_siswa', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('nama_siswa') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('alamat', 'ALAMAT *') }}
                                    {{ Form::text('alamat', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('tpt_lahir', 'TEMPAT LAHIR *') }}
                                    {{ Form::text('tpt_lahir', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('tpt_lahir') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('tgl_lahir', 'TANGGAL LAHIR *') }}
                                    {{ Form::date('tgl_lahir', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('tgl_lahir') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('kelas', 'KELAS *') }}
                                    {!! Form::select('kelas', \App\Kelas::pluck('nama_kelas', 'nama_kelas'), null, ['class'
                                    => 'form-control']) !!}
                                    <span class="text-danger">{{ $errors->first('kelas') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('jenkel', 'JENIS KELAMIN *') }} <br>
                                    <input type="radio" name="jenkel" id="jenkel" value="Laki-Laki"
                                        {{ $obj->jenkel == 'Laki-Laki' ? 'checked="checked"' : '' }} required> Laki-laki
                                    <input type="radio" name="jenkel" value="Perempuan"
                                        {{ $obj->jenkel == 'Perempuan' ? 'checked="checked"' : '' }}> perempuan
                                    <span class="text-danger">{{ $errors->first('jenkel') }}</span><br><br>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('profil', 'FOTO PROFIL') }}
                                    {{ Form::file('profil', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('profil') }}</span>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('email', 'ALAMAT EMAIL *') }}
                                    {{ Form::email('email', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('password', 'PASSWORD *') }}
                                    {{ Form::password('password', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
