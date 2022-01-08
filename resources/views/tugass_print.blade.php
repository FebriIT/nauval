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
                <div class="h2 m-0">SMAN2</div>
            </div>
            <div class="col-6 my-2">
                <table>
                    <tbody>
                        <tr>
                            <td>Guru</td>
                            <td>&ensp;: {{ $tugas->guru->nama_guru }}</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>&ensp;: {{ $tugas->kelas }}</td>
                        </tr>
                        <tr>
                            <td>Mata Pelajaran</td>
                            <td>&ensp;: {{ $tugas->mapel }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6 my-2">
                <table>
                    <tbody>
                        <tr>
                            <td>Batas Waktu</td>
                            <td>&ensp;: {{ \Carbon\Carbon::parse($tugas->batas_waktu)->format('d/M/Y | H:i') }}</td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>&ensp;: {{ $tugas->nama_tugas }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Upload</th>
                            <th>Nama Siswa</th>
                            <th>Nilai Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obj as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->created_at->format('d/m/Y | H:i') }}</td>
                            <td>{{ $item->siswa->nama_siswa }}</td>
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