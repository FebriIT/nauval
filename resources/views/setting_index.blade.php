@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><b>UBAH PASSWORD</b></div>
                        <br>
                        <div class="card-body">
                                {{ Form::model($obj, array('action' => $action, 'files' => true, 'method' => $method, 'enctype' => 'multipart/form-data')) }}
                                    <div class="form-group">
                                        {{ Form::label('password', 'ubah password *') }}
                                        {{ Form::text('password',null,['class' => 'form-control']) }}
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