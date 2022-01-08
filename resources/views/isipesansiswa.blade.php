@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <div class="col">
            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ $pesan->siswa->nama_siswa }}</h3>

                    <div class="card-tools">
                        <a name="" id="" class="btn btn-primary btn-sm" href="{{ url('siswa/pesan') }}"
                            role="button">Back</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages" style="height: 400px">
                        @foreach ($isipesan as $item)
                            @if ($item->user_type == 'App\Guru')

                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">{{ $item->user->nama_guru }}</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="{{ $item->user->getProfil() }}"
                                        alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        {{ $item->pesan }}
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                            @else
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">{{ $item->user->nama_siswa }}</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="{{ $item->user->getProfil() }}"
                                        alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text text-right">
                                        {{ $item->pesan }}
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                            @endif
                            <!-- /.direct-chat-msg -->
                        @endforeach
                    </div>
                    <!-- /.direct-chat-pane -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <form action="{{ url('siswa/pesan/' . $id . '/kirim') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="pesan" placeholder="Type Message ..." class="form-control">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-warning">Send</button>
                            </span>
                        </div>
                    </form>
                </div>
                <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
        </div>
    </div>

    {{--
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
                        {{ Form::label('mapel', 'MATA PELAJARAN *') }}
                        {!! Form::select('mapel', \App\Mapel::where('nip', $id_guru)->pluck('nama_pelajaran',
                        'nama_pelajaran'), null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('mapel') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('kelas', 'KELAS *') }}
                        {!! Form::select('kelas', \App\Mapel::where('nip', $id_guru)->pluck('kelas', 'kelas'), null,
                        ['class' => 'form-control']) !!}
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
                    <div class="form-group">
                        {{ Form::label('tgl_upload', 'TANGGAL UPLOAD *') }}
                        {{ Form::date('tgl_upload', null, ['class' => 'form-control']) }}
                        <span class="text-danger">{{ $errors->first('tgl_upload') }}</span>
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
    <!-- /.modal --> --}}
@endsection
