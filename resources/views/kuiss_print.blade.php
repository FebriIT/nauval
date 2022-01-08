<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/admin/assets/css/adminlte.min.css">

</head>

<body class="p-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="h2 m-0">Madrasah Tsanawiyah Negeri 3 Muaro Jambi</div>
            </div>
            @php
            $waktu_mulai = \Carbon\Carbon::parse($kuis->waktu_mulai);
            $waktu_selesai = \Carbon\Carbon::parse($kuis->waktu_selesai);
            $lama_waktu = $waktu_mulai->diffInMinutes($waktu_selesai);
            @endphp
            <div class="col-6">
                <table>
                    <tbody>
                        <tr>
                            <td>Guru</td>
                            <td>&ensp;: {{ $kuis->guru->nama_guru }}</td>
                        </tr>
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
                            <td>Lama Pengerjaan</td>
                            <td>&ensp;: {{ $lama_waktu }} Menit</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Benar</th>
                            <th>Salah</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obj as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->siswa->nama_siswa }}</td>
                            <td>
                                {{ $item->soaljawaban->where('value', 1)->count() }}
                            </td>
                            <td>
                                {{ $item->soaljawaban->where('value', 0)->count() }}
                            </td>
                            <td>{{ $item->nilai }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>