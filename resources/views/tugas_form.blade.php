@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><b>TAMBAH TUGAS</b></div>
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
                                    {{ Form::label('nama_tugas', 'KETERANGAN *') }}
                                    {{ Form::text('nama_tugas', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('nama_tugas') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('file_tugas', 'FILE TUGAS *') }}
                                    {{ Form::file('file_tugas', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('file_tugas') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('batas_waktu', 'BATAS WAKTU *') }}
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#datetimepicker1" name="batas_waktu"
                                            value="{{ $obj ? \Carbon\Carbon::parse($obj->batas_waktu)->format('d/m/Y H:i') : '' }}" />
                                        <div class="input-group-append" data-target="#datetimepicker1"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('kelas', 'KELAS *') }}
                                    {!! Form::select('kelas', \App\Kelas::pluck('nama_kelas', 'nama_kelas'), null, ['class'
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
