@extends('layouts.master')
@section('content')
<div class="container-fluid mt-2">
    <div class="row justify-content-center">
        <div class="col-11">
            <h2 class="m-3 text-bold" style="color: #777777"> Detail Jawaban </h2>
            <div class="card p-4 shadow-lg">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Siswa</td>
                                        <td>&ensp;: {{ $kuissiswa->siswa->nama_siswa }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nilai</td>
                                        <td>&ensp;: {{ $kuissiswa->nilai }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <table id="example1" class="table table-bordered table-striped shadow table-sm">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Keterangan</th>
                                <th>Penjelasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kuissiswa->soaljawaban as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->soal->soal }}</td>
                                <td>{{ $item->jawaban }}
                                <td>
                                    <?php
                                            $jawaban = $item->value;
                                            if ($jawaban == '1') {
                                            echo 'benar';
                                            } else {
                                            echo 'salah';
                                            }
                                            ?>
                                </td>
                                <td>{{ $item->soal->keterangan }}</td>
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