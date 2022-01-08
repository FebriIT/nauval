@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-11">
                <h2 class="m-3 text-bold" style="color: #777777"> Materi </h2>
                <div class="card p-4 shadow-lg">
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped shadow table-sm">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>MATA PELAJARAN</th>
                                    <th>GURU</th>
                                    <th>MATERI</th>
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
                                        <td>{{ $item->mapel }}</td>
                                        <td>{{ $nama_guru['nama_guru'] }}</td>
                                        <td>{{ $item->nama_materi }}</td>
                                        <td>
                                            @php
                                            $ekstensi = explode('.',$item->file_materi);
                                            $ekstensi = end($ekstensi);
                                            @endphp
                                            @if ($ekstensi == 'pdf')
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ url('siswa/materisiswa/materi_view/' . $item->id) }}"
                                                    onclick="basicPopup(this.href);return false">
                                                    view</a>
                                            @endif
                                            <a class="btn btn-primary btn-sm" href="{{ Storage::url($item->file_materi) }}"
                                                download><i class="fa fa-eye" aria-hidden="true"></i> Lihat</a>
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
