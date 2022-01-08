@extends('layouts.master')
@section('content')
<div class="container-fluid mt-2">
    <div class="row justify-content-center">
        <div class="col-11">
            <h2 class="m-3 text-bold" style="color: #777777"> Manajemen Tugas Yang Dikumpul </h2>
            <div class="card p-4 shadow-lg">
                <!-- /.card-header -->
                <div class="card-body">
                    <table>
                        <tbody>
                            <tr>
                                <td>Kelas</td>
                                <td>&ensp;: {{ $tugas->kelas }}</td>
                            </tr>
                            <tr>
                                <td>Mata Pelajaran</td>
                                <td>&ensp;: {{ $tugas->mapel }}</td>
                            </tr>
                            <tr>
                                <td>Batas Waktu</td>
                                <td>&ensp;: {{ \Carbon\Carbon::parse($tugas->batas_waktu)->format('d/m/Y | H:i') }}</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>&ensp;: {{ $tugas->nama_tugas }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary btn-sm my-2"
                        onclick="printFunction('{{ Request::url() .'/print' }}')" href="#" role="button">Print
                        Laporan</button>
                    <table id="example1" class="table table-bordered table-striped shadow table-sm">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>No</th>
                                <th>WAKTU UPLOAD</th>
                                <th>NAMA</th>
                                <th>FILE</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obj as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->created_at->format('d/m/Y | H:i') }}</td>
                                <td>{{ $item->siswa->nama_siswa }}</td>
                                <td> <a class="btn btn-success btn-sm" href="{{ \Storage::url($item->file_jawaban) }}"
                                        role="button"> <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                                </td>
                                <td>
                                    @if($item->nilai > 0)
                                    <span class="badge badge-pill badge-success">Sudah Dinilai :
                                        {{ $item->nilai }}</span>
                                    @else
                                    <span class="badge badge-pill badge-danger">Belum Dinilai</span>
                                    @endif
                                </td>
                                <td width="125px">
                                    <form method="POST" action="{{ Request::url() . '/nilai/' . $item->id }}">
                                        @csrf
                                        @method('put')
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control text-center" name="nilai"
                                                placeholder="100">
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-primary btn-flat"> <i
                                                        class="fas fa-pencil-alt    "></i> Nilai</button>
                                            </span>
                                        </div>
                                    </form>
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