@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><b>KIRIM TUGAS</b></div>
                        <br>
                        <div class="card-body">
                                {{ Form::model($obj, array('action' => $action, 'files' => true, 'method' => $method)) }}
                                    <input type="hidden" value="{{ $id_tugas }}" name="tugas_id">
                                    <input type="hidden" value="{{ $nip_guru }}" name="nip">
                                    <div class="form-group">
                                        {{ Form::label('file_jawaban', 'FILE JAWABAN') }}
                                        {{ Form::file('file_jawaban',null,['class' => 'form-control']) }}
                                        <span class="text-danger">{{ $errors->first('file_jawaban') }}</span>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true">KIRIM</i></button>
                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection