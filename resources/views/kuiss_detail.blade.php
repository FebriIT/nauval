@extends('layouts.master')
@section('content')
<div class="container-fluid mt-2">
    <div class="row justify-content-center">
        <div class="col-11">
            <h2 class="m-3 text-bold" style="color: #777777"> Manajemen Kuis Yang Dikumpul </h2>
            <div class="card p-4 shadow-lg">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        @php
                        $waktu_mulai = \Carbon\Carbon::parse($kuis->waktu_mulai);
                        $waktu_selesai = \Carbon\Carbon::parse($kuis->waktu_selesai);
                        $lama_waktu = $waktu_mulai->diffInMinutes($waktu_selesai);
                        @endphp
                        <div class="col-6">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>&ensp;: {{ $kuis->kelas }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mata Pelajaran</td>
                                        <td>&ensp;: {{ $kuis->mapel }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Kuis</td>
                                        <td>&ensp;: {{ $kuis->soal }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Mulai</td>
                                        <td>&ensp;: {{ $waktu_mulai->format('d/m/Y | H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Pengerjaan</td>
                                        <td>&ensp;: {{ $waktu_selesai->format('d/m/Y | H:i') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lama Pengerjaan</td>
                                        <td>&ensp;: {{ $lama_waktu }} Menit</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-sm my-2"
                        onclick="printFunction('{{ Request::url() .'/print' }}')" href="#" role="button">Print
                        Laporan</button>
                    <table id="example1" class="table table-bordered table-striped shadow table-sm">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>BENAR</th>
                                <th>SALAH</th>
                                <th>NILAI</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kuissiswa as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->siswa->nama_siswa }}</td>
                                <td>
                                    {{ $item->soaljawaban->where('value', 1)->count() }}
                                </td>
                                <td>
                                    {{ $item->soaljawaban->where('value', 0)->count() }}
                                </td>
                                <td>
                                    {{ $item->nilai }}
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ Request::url() . '/detail/' . $item->id }}" role="button">Detail</a>
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

@section('script')
<script>
    function printFunction(url) {
        const width = screen.width;
        const height = screen.height;
        window.open(url,'', 'width='+ width +',height=100' + height);
    }
</script>

@endsection