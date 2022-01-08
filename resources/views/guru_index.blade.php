@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-11">
                <h2 class="m-3 text-bold" style="color: #777777"> Manajemen Guru</h2>
                <div class="card p-4 shadow-lg">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-primary">
                            <i class='fas fa-user-plus'></i> Tambah
                        </button>
                        <table id="example1" class="table table-bordered table-striped shadow table-sm">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>NAMA GURU</th>
                                    <th>EMAIL</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obj as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="/admin/guru/profil/{{ $item->id }}">{{ $item->nama_guru }}</a>
                                        </td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <a href="/admin/guru/hapus/{{ $item->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Data yang berkaitan dengan guru akan ikut terhapus, Anda yakin ingin menghapus data?')"> <i
                                                    class='fas fa-trash-alt'></i> Hapus
                                            </a>

                                            {{-- @include('tombol_hapus',['url' => url('admin/guru/hapus/'.$item->id)]) --}}
                                            @include('tombol_ubah',['url' => url('admin/guru/edit/'.$item->id)])

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
                        {{ Form::label('id', 'NIP *') }}
                        {{ Form::number('id', null, ['class' => 'form-control', 'required']) }}
                        <span class="text-danger">{{ $errors->first('id') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nama_guru', 'NAMA GURU *') }}
                        {{ Form::text('nama_guru', null, ['class' => 'form-control', 'required']) }}
                        <span class="text-danger">{{ $errors->first('nama_guru') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('alamat', 'ALAMAT *') }}
                        {{ Form::text('alamat', null, ['class' => 'form-control', 'required']) }}
                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('jenkel', 'JENIS KELAMIN *') }} <br>
                        <input type="radio" name="jenkel" id="jenkel" value="Laki-laki" required> Laki-laki
                        <input type="radio" name="jenkel" value="perempuan"> perempuan
                        <span class="text-danger">{{ $errors->first('jenkel') }}</span><br><br>
                    </div>
                    <div class="form-group">
                        {{ Form::label('tmpt_lahir', 'TEMPAT LAHIR *') }}
                        {{ Form::text('tmpt_lahir', null, ['class' => 'form-control', 'required']) }}
                        <span class="text-danger">{{ $errors->first('tmpt_lahir') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('tgl_lahir', 'TANGGAL LAHIR *') }}
                        {{ Form::date('tgl_lahir', null, ['class' => 'form-control', 'required']) }}
                        <span class="text-danger">{{ $errors->first('tgl_lahir') }}</span>
                    </div>

                    <div class="form-group">
                        {{ Form::label('profil', 'FOTO PROFIL') }}
                        {{ Form::file('profil', null, ['class' => 'form-control']) }}
                        <span class="text-danger">{{ $errors->first('profil') }}</span>
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'ALAMAT EMAIL *') }}
                        {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'PASSWORD *') }}
                        {{ Form::password('password', null, ['class' => 'form-control', 'required']) }}
                        <span class="text-danger">{{ $errors->first('password') }}</span>
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
