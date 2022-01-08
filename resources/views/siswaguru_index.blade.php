@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11">
                <h2 class="m-3 text-bold" style="color: #777777"> Manajemen Siswa </h2>
                <div class="card p-4 shadow-lg">
                    <div class="card-header">
                        <div class="col-12 text-right">
                            <a href="{{ url('guru/kelasguru/index') }}" class="btn btn-primary" href="#" role="button"><i
                                    class="fa fa-fast-backward" aria-hidden="true"> Kembali</i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped shadow table-sm">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>NAMA</th>
                                    <th>KELAS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obj as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_siswa }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm fa fa-paper-plane"
                                                href="{{ url('guru/pesan/user/' . $item->id . '/tambah') }}">Kirim Pesan</a>
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
