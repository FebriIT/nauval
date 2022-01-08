@extends('layouts.master')
@section('content')
<div class="container-fluid mt-2">
    <div class="row justify-content-center">
        <div class="col-11">
            <h2 class="m-3 text-bold" style="color: #777777"> Kuis </h2>
            <div class="card p-4 shadow-lg">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped shadow table-sm">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>NO</th>
                                <th>MULAI</th>
                                <th>KETERANGAN</th>
                                <th>MATA PELAJARAN</th>
                                <th>GURU</th>
                                <th>NILAI</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kuis as $item)
                            @php
                            $id_soal = $item->id;
                            $nama_guru = \App\Guru::where('id', $item->nip)->get()->first();

                            $waktu_mulai = \Carbon\Carbon::parse($item->waktu_mulai);
                            $waktu_selesai = \Carbon\Carbon::parse($item->waktu_selesai);
                            $waktu_sekarang = \Carbon\Carbon::now()->timestamp;
                            $lama_waktu = $waktu_mulai->diffInMinutes($waktu_selesai);

                            $sudah = \App\Kuissiswa::where('kuis_id', $item->id)->where('siswa_id', $siswa_id)->first();


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
                                    <td>{{ $waktu_mulai->format('d M | H:i') }} | {{ $lama_waktu }} Menit</td>
                                    <td>{{ $item->soal }}</td>
                                    <td>{{ $item->mapel }}</td>
                                    <td>{{ $nama_guru['nama_guru'] }}</td>
                                    <td>
                                        @if($sudah)
                                        <span class="badge badge-pill badge-success">{{ $sudah->nilai }}</span>
                                        @else
                                        <span class="badge badge-pill badge-primary">Belum Dikerjakan</span>
                                        @endif
                                    </td>
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
                                        <span class="badge badge-pill badge-danger">Waktu Habis</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($sudah)
                                        <a class="btn btn-success btn-sm" href="#">Telah Dikerjakan</a>
                                        @if($status == 4)
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ url('siswa/kuissiswa/'. $sudah->id) }}">Detail</a>
                                        @endif
                                        @elseif ($status == 3)
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ url('siswa/soal/kerjakansoal/' . $item->id) }}">Kerjakan</a>
                                        @endif
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