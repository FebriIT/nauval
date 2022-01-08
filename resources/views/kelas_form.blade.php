@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><b>TAMBAH KELAS</b></div>
                        <br>
                        <div class="card-body">
                                {{ Form::model($obj, array('action' => $action, 'files' => true, 'method' => $method)) }}
                                    <div class="form-group">
                                        {{ Form::label('nama_kelas', 'NAMA KELAS *') }}
                                        {{ Form::text('nama_kelas',null,['class' => 'form-control']) }}
                                        <span class="text-danger">{{ $errors->first('nama_kelas') }}</span>
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