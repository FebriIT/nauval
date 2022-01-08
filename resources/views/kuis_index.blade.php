@extends('layouts.master')
@section('content')
    <div class="d-none" id="waktu_sekarang" data-sekarang="{{ $sekarang }}"></div>

    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-11">
                <h2 class="m-3 text-bold" style="color: #777777"> Manajemen Kuis</h2>
                <div class="card p-4 shadow-lg">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-primary">
                            <i class='fas fa-plus-circle'></i> Tambah
                        </button>
                        <table id="example1" class="table table-bordered table-striped shadow table-sm">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>NO</th>
                                    <th>MULAI</th>
                                    <th>MAPEL</th>
                                    <th>KELAS</th>
                                    <th>KETERANGAN</th>
                                    <th>SOAL</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obj as $item)
                                    @php
                                    $nama_guru = \App\Guru::where('id', $item->nip)->get()->first();
                                    $waktu_mulai = \Carbon\Carbon::parse($item->waktu_mulai);
                                    $waktu_selesai = \Carbon\Carbon::parse($item->waktu_selesai);
                                    $lama_waktu = $waktu_mulai->diffInMinutes($waktu_selesai);
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $waktu_mulai->format('d M | H:i') }} | {{ $lama_waktu }} Menit</td>
                                        {{-- <td>{{ $lama_waktu }} Menit </td>
                                        --}}
                                        <td>{{ $item->mapel }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        <td>{{ $item->soal }}</td>
                                        <td>{{ $item->soals->count() }}</td>
                                        <td>
                                            @if ($item->status == 0)
                                                <span class="badge badge-pill badge-danger">Non-Aktif</span>
                                            @else
                                                <span class="badge badge-pill badge-success">Aktif</span>
                                            @endif
                                        </td>
                                        <td class="text-center" width="275px">
                                            @if ($item->status == 0)
                                                <a name="" id="" class="btn btn-success btn-sm"
                                                    href="{{ url('guru/kuis/' . $item->id . '/status') }}"
                                                    role="button">ON</a>
                                            @else
                                                <a name="" id="" class="btn btn-warning btn-sm"
                                                    href="{{ url('guru/kuis/' . $item->id . '/status') }}"
                                                    role="button">OFF</a>
                                            @endif
                                            @include('tombol_hapus',['url' => url('guru/kuis/hapus/'.$item->id)])
                                            @include('tombol_ubah',['url' => url('guru/kuis/edit/'.$item->id)])

                                            <a class="btn btn-primary btn-sm"
                                                href="{{ url('guru/kuis/lihatsoal/' . $item->id) }}"><i class="fa fa-eye"
                                                    aria-hidden="true"></i> Detail</a>
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
                        {{ Form::label('mapel', 'MATA PELAJARAN *') }}
                        {!! Form::select('mapel', \App\Mapel::where('nip', $id_guru)->pluck('nama_pelajaran',
                        'nama_pelajaran'), null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('mapel') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('kelas', 'KELAS *') }}
                        {!! Form::select('kelas', \App\Kelas::pluck('nama_kelas', 'nama_kelas'), null, ['class' =>
                        'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('kelas') }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('waktu_mulai', 'WAKTU MULAI *') }}
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"
                                name="waktu_mulai" />
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('waktu_selesai', 'WAKTU SELESAI *') }}
                        <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2"
                                name="waktu_selesai" />
                            <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('soal', 'KETERANGAN *') }}
                        {{ Form::text('soal', null, ['class' => 'form-control']) }}
                        <span class="text-danger">{{ $errors->first('soal') }}</span>
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
