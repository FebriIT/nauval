@extends('layouts.master')
@section('content')
<div class="container-fluid mt-2">
    <div class="row justify-content-center">
        <div class="col-11">
            <h2 class="m-3 text-bold" style="color: #777777"> Soal Kuis </h2>
            <div class="card p-4 shadow-lg">
                <div class="col-12 text-right">
                    <a href="{{ url('guru/kuis/index') }}" class="btn btn-primary" href="#" role="button"><i
                            class="fa fa-fast-backward" aria-hidden="true"> Kembali</i></a>
                </div>
                <div class="panel-body">
                    <div class="card-body">
                        <div class="card card-danger collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Soal</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{ Form::model($obj, ['action' => $action, 'files' => true, 'method' => $method]) }}
                                <div class="form-group">
                                    {{ Form::label('soal', 'soal *') }}
                                    {{ Form::text('soal', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('soal') }}</span>
                                </div>
                                <div class="form-group" id="option a">
                                    {{ Form::label('a', 'option A *') }}
                                    {{ Form::text('a', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('a') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('b', 'option B *') }}
                                    {{ Form::text('b', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('b') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('c', 'option C *') }}
                                    {{ Form::text('c', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('c') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('d', 'option D *') }}
                                    {{ Form::text('d', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('d') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('jawaban', 'jawaban *') }}
                                    {!! Form::select('jawaban', ['' => '-- Pilih Jawaban --', 'a' => 'A', 'b' =>
                                    'B', 'c' => 'C', 'd' => 'D'], null, ['class' => 'form-control']) !!}
                                    <span class="text-danger">{{ $errors->first('jawaban') }}</span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('keterangan', 'Keterangan *') }}
                                    {{ Form::text('keterangan', null, ['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                                </div>

                                <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
                                {!! Form::close() !!}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <hr>

                        <table id="example1" class="table table-bordered table-striped shadow table-sm">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>C</th>
                                    <th>D</th>
                                    <th>Jawaban</th>
                                    <th>Keterangan</th>
                                    <th> Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obj as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->soal }}</td>
                                    <td>{{ $item->a }}</td>
                                    <td>{{ $item->b }}</td>
                                    <td>{{ $item->c }}</td>
                                    <td>{{ $item->d }}</td>
                                    <td>{{ $item->jawaban }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td class="text-center">
                                        @include('tombol_hapus',['url' => url('guru/soal/hapus/'.$item->id)])
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection