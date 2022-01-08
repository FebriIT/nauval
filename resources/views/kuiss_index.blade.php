@extends('layouts.master')
@section('content')
<div class="container-fluid mt-2">
    <div class="row justify-content-center">
        <div class="col-11">
            <h2 class="m-3 text-bold" style="color: #777777"> Manajemen Kuis Yang Dikerjakan </h2>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped shadow table-sm">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>NO</th>
                                <th>MULAI</th>
                                <th>PENGERJAAN</th>
                                <th>LATIHAN</th>
                                <th>KELAS</th>
                                <th>MATA PELAJARAN</th>
                                <th>STATUS</th>
                                <th>SISWA MENGERJAKAN</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kuis as $item)
                            @php
                            $waktu_mulai = \Carbon\Carbon::parse($item->waktu_mulai);
                            $waktu_selesai = \Carbon\Carbon::parse($item->waktu_selesai);
                            $lama_waktu = $waktu_mulai->diffInMinutes($waktu_selesai);
                            $waktu_sekarang = \Carbon\Carbon::now()->timestamp;


                            $status = 0;

                            if($item->status == 0){
                            $status = 1;
                            } else {
                            if($waktu_mulai->timestamp > $waktu_sekarang){
                            $status = 2;
                            }
                            elseif ($waktu_mulai->timestamp < $waktu_sekarang && $waktu_selesai->timestamp >
                                $waktu_sekarang){
                                $status = 3;
                                }
                                elseif ($waktu_selesai->timestamp < $waktu_sekarang) { $status=4; } else { $status=0; }
                                    } @endphp <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $waktu_mulai->format('d M | H:i') }}</td>
                                    <td>{{ $lama_waktu }} Menit </td>
                                    <td>{{ $item->soal }}</td>
                                    <td>{{ $item->kelas }}
                                    <td>{{ $item->mapel }}</td>
                                    <td>
                                        @if($status == 0)
                                        <span class="badge badge-pill badge-danger">Tidak Diketahui</span>
                                        @elseif($status == 1)
                                        <span class="badge badge-pill badge-danger">Belum Diaktifkan</span>
                                        @elseif($status == 2)
                                        <span class="badge badge-pill badge-primary">Belum Mulai</span>
                                        @elseif($status == 3)
                                        <span class="badge badge-pill badge-success">Berjalan</span>
                                        @elseif($status == 4)
                                        <span class="badge badge-pill badge-primary">Selesai</span>
                                        @endif

                                    </td>
                                    <td>{{ $item->kuissiswa->count() }}</td>
                                    <td>
                                        @include('tombol_detail',['url' => url('guru/kuiss/'. $item->id.'/'.
                                        $item->id_kuis)])
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