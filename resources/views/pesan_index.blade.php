@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <li aria-hidden="true"> Pesan </li>
                        </h3>
                        <div class="card-tools">
                            <a name="" id="" class="btn btn-primary btn-sm" href="{{ url('guru/pesan/user') }}"
                                role="button">Tambah Pesan</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @foreach ($pesan as $item)
                            <div class="card">
                                <div class="card-body p-3">

                                    <a href="{{ url('guru/pesan/' . $item->id . '/hapus') }}"
                                        class="badge badge-danger badge-pill float-right">Hapus</a>
                                    <a href="{{ url('guru/pesan/' . $item->id) }}" class="media">
                                        <img src="{{ $item->siswa->getProfil() }}" class="mr-3 rounded-circle" alt="..."
                                            width="70px">

                                        <div class="media-body">
                                            <div class="m-0">{{ $item->siswa->nama_siswa }}</div>
                                            @if (!empty($item->isipesan->toArray()))
                                                <span style="font-size: 18px">
                                                    @php
                                                    $user = $item->isipesan[0]->user_type;
                                                    $user = explode('\\',$user);
                                                    $user = end($user);
                                                    $user = strtolower($user);
                                                    $nama = $item->siswa->nama_siswa;
                                                    $nama = explode(' ', $nama);
                                                    $nama = $nama[0];

                                                    $last = $item->isipesan->last()->pesan;
                                                    @endphp
                                                    @if ($user == 'guru')
                                                        Saya :
                                                    @else
                                                        {{ $nama }} :
                                                    @endif
                                                    {{ $last }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
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
