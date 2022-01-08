@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><b>TAMBAH MATA PELAJARAN</b></div>
                            <br>
                            <div class="card-body">
                                {{ Form::model($obj, ['action' => $action, 'files' => true, 'method' => $method]) }}
                                <div class="form-group">
                                    {{ Form::label('nama_pelajaran', 'MATA PELAJARAN *') }}
                                    {{ Form::text('nama_pelajaran', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('nama_pelajaran') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('nip', 'NAMA GURU *') }}
                                    {!! Form::select('nip', \App\Guru::pluck('nama_guru', 'id'), null, ['class' =>
                                    'form-control']) !!}
                                    <span class="text-danger">{{ $errors->first('nip') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('kelas', 'KELAS *') }}
                                    {!! Form::select('kelas', \App\Kelas::pluck('Nama_kelas', 'Nama_kelas'), null, ['class'
                                    => 'form-control']) !!}
                                    <span class="text-danger">{{ $errors->first('kelas') }}</span>
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
