@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><b>TAMBAH MATERI</b></div>
                            <br>
                            <div class="card-body">
                                {{ Form::model($obj, ['action' => $action, 'files' => true, 'method' => $method]) }}
                                <div class="form-group">
                                    {{ Form::label('mapel', 'MATA PELAJARAN *') }}
                                    {!! Form::select('mapel', \App\Mapel::where('nip', $id_guru)->pluck('nama_pelajaran',
                                    'nama_pelajaran'), null, ['class' => 'form-control']) !!}
                                    <span class="text-danger">{{ $errors->first('mapel') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('kelas', 'KELAS *') }}
                                    {!! Form::select('kelas', \App\Mapel::where('nip', $id_guru)->pluck('kelas', 'kelas'),
                                    null, ['class' => 'form-control']) !!}
                                    <span class="text-danger">{{ $errors->first('kelas') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('nama_materi', 'KETERANGAN *') }}
                                    {{ Form::text('nama_materi', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('nama_materi') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('file_materi', 'FILE MATERI *') }}
                                    {{ Form::file('file_materi', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('file_materi') }}</span>
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
