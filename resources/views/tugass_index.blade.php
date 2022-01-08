@extends('layouts.master')
@section('content')
<div class="container-fluid mt-2">
    <div class="row justify-content-center">
        <div class="col-11">
            <h2 class="m-3 text-bold" style="color: #777777"> Manajemen Tugas Yang Dikumpul </h2>
            <div class="card p-4 shadow-lg">
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped shadow table-sm">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>BATAS WAKTU</th>
                                <th>MATA PELAJARAN</th>
                                <th>KELAS</th>
                                <th>KETERANGAN</th>
                                <th>SISWA MENGUMPULKAN</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obj as $item)
                            @php
                            $nama_guru = \App\Guru::where('id', $item->nip)->get()->first();
                            $ekstensi_materi = explode('.',$item->file_tugas);
                            $ekstensi_materi = end($ekstensi_materi);
                            @endphp
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->batas_waktu)->format('d/m/Y | H:i') }}
                                    @if(\Carbon\Carbon::parse($item->batas_waktu)->timestamp < \Carbon\Carbon::now()->
                                        timestamp)
                                        | <span class="badge badge-pill badge-danger">Waktu Habis</span>
                                        @endif
                                </td>
                                <td>{{ $item->mapel }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->nama_tugas }}</td>
                                <td> {{ $item->tugasygdikerjakan->count() }} </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ url('guru/tugass/'.$item->id) }}"
                                        role="button"> <i class="fa fa-eye" aria-hidden="true"></i> Detail</a>
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
@endsection