@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><b>TAMBAH SOAL</b></div>
                            <br>
                            <div class="card-body">
                                {{ Form::model($obj, ['action' => $action, 'files' => true, 'method' => $method, 'enctype' => 'multipart/form-data']) }}
                                <div class="form-group">
                                    {{ Form::label('soal', 'soal *') }}
                                    {{ Form::text('soal', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('soal') }}</span>
                                </div>
                                <div class="form-group" id="option a">
                                    {{ Form::label('op1', 'option A *') }}
                                    {{ Form::text('op1', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('op1') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('op2', 'option B *') }}
                                    {{ Form::text('op2', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('op2') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('op3', 'option C *') }}
                                    {{ Form::text('op3', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('op3') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('op4', 'option D *') }}
                                    {{ Form::text('op4', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('op4') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('jawaban', 'jawaban *') }}
                                    {{ Form::text('jawaban', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('jawaban') }}</span>
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
