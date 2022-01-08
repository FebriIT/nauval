@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-11">
                <h2 class="m-3 text-bold" style="color: #777777"> Manajemen Matapelajaran </h2>
                <div class="card p-4  shadow-lg">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-primary">
                            <i class='fas fa-plus-circle'></i> Tambah
                        </button>
                        <table id="example1" class="table table-bordered table-striped shadow table-sm">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>MATA PELAJARAN</th>
                                    <th>NAMA GURU</th>
                                    <th>KELAS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obj as $item)
                                    @php
                                    $nama_guru = \App\Guru::where('id', $item->nip)->get()->first();
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_pelajaran }}</td>
                                        <td>{{ $nama_guru['nama_guru'] }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        <td>
                                            @include('tombol_hapus',['url' => url('admin/mapel/hapus/'.$item->id)])
                                            @include('tombol_ubah',['url' => url('admin/mapel/edit/'.$item->id)])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-primary">
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::model($obj, ['action' => $action, 'files' => true, 'method' => $method]) }}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('nama_pelajaran', 'MATA PELAJARAN *') }}
                        {{ Form::text('nama_pelajaran', null, ['class' => 'form-control']) }}
                        <span class="text-danger">{{ $errors->first('nama_pelajaran') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nip', 'NAMA GURU *') }}
                        {!! Form::select('nip', \App\Guru::pluck('nama_guru', 'id'), null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('nip') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('kelas', 'KELAS *') }}
                        {!! Form::select('kelas', \App\Kelas::pluck('Nama_kelas', 'Nama_kelas'), null, ['class' =>
                        'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('kelas') }}</span>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">CLOSE</button>
                    <button type="submit" type="button" class="btn btn-outline-light">SIMPAN</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
