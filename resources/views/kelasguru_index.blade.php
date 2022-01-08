@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-11">
                <h2 class="m-3 text-bold" style="color: #777777"> Kelas </h2>
                <div class="card p-4 shadow-lg">
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped shadow table-sm">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>KELAS</th>
                                    <th>JUMLAH SISWA</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obj as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kelas }}</td>
                                        @php
                                        $jumlah = \App\Siswa::where('kelas',$item->nama_kelas)->count();
                                        @endphp
                                        <td>{{ $jumlah }}</td>
                                        <td>
                                            @include('tombol_detail',['url' => url('guru/siswaguru/'.$item->id)])
                                            <!--@include('tombol_detail',['url' => url('guru/kelasguru/detail/'.$item->id)]) -->
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
