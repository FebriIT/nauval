@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-11">
                <h2 class="m-3 text-bold" style="color: #777777"> Tugas </h2>
                <div class="card p-4 shadow-lg">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped shadow table-sm">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>BATAS WAKTU</th>
                                    <th>TUGAS</th>
                                    <th>MATA PELAJARAN</th>
                                    <th>GURU</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obj as $item)
                                    @php
                                    $nama_guru = \App\Guru::where('id', $item->nip)->get()->first();
                                    $sudah = \App\Tugasygdikerjakan::where('tugas_id', $item->id)->where('siswa_id',
                                    $id_siswa)->first();

                                    $batas_waktu = \Carbon\Carbon::parse($item->batas_waktu)->timestamp;
                                    $waktu_sekarang = \Carbon\Carbon::now()->timestamp;

                                    $status = 0;
                                    if($sudah){
                                    if($sudah->nilai > 0){
                                    // belum dinilai
                                    $status = 1;
                                    }else {
                                    // sudah dinilai
                                    $status = 2;
                                    }
                                    } else {
                                    if($item->status == 0){
                                    $status = 4;
                                    }
                                    elseif($waktu_sekarang > $batas_waktu){
                                    // waktu habis
                                    $status = 3;
                                    } else {
                                    // belum diupload
                                    $status = 0;
                                    }
                                    }
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->batas_waktu)->format('d/m/Y | H:i') }}
                                        </td>
                                        <td>{{ $item->nama_tugas }}</td>
                                        <td>{{ $item->mapel }}</td>
                                        <td>{{ $nama_guru['nama_guru'] }}</td>
                                        <td>
                                            @if ($status == 0)
                                                <span class="badge badge-pill badge-danger">Belum Diupload</span>
                                            @elseif($status == 1)
                                                <span class="badge badge-pill badge-success">Nilai :
                                                    {{ $sudah->nilai }}</span>
                                            @elseif($status == 2)
                                                <span class="badge badge-pill badge-primary">Belum Dinilai</span>
                                            @elseif($status == 3)
                                                <span class="badge badge-pill badge-danger">Waktu Habis</span>
                                            @elseif($status == 4)
                                                <span class="badge badge-pill badge-danger">Belum Diaktifkan</span>
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                            $ekstensi = explode('.',$item->file_tugas);
                                            $ekstensi = end($ekstensi);
                                            @endphp
                                            @if ($ekstensi == 'pdf')
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ url('siswa/tugassiswa/tugas_view/' . $item->id) }}"
                                                    onclick="basicPopup(this.href);return false">
                                                    view</a>
                                            @endif
                                            <a class="btn btn-primary btn-sm" href="{{ Storage::url($item->file_tugas) }}"
                                                download><i class="fa fa-eye" aria-hidden="true"> Lihat</i></a>
                                            @if ($sudah)
                                                <a class="btn btn-success btn-sm" href="#"><i
                                                        class='fas fa-check-double'>Sudah
                                                        Dikumpul</i></a>
                                            @elseif($status == 0)
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ url('siswa/tugassiswa/kirim/' . $item->id) }}"><i
                                                        class='far fa-edit'>Kumpul Tugas</i></a>
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
