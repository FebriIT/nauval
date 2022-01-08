@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><b>SOAL</b></div>
                        <div class="card-body">
                            <div>Sisa Waktu : <span id="waktu"></span></div>
                            <br>
                            {{ Form::model($obj, ['action' => $action, 'files' => true, 'method' => $method, 'id' => 'form']) }}
                            <input type="hidden" value="{{ $nip_guru }}" name="nip">
                            <input type="hidden" value="{{ $siswa_id }}" name="siswa_id">
                            @foreach ($soal as $obj)
                            <div class="form-group">
                                <strong><i>{{ $loop->iteration }}. {{ $obj->soal }}</i></strong><br>
                                <input type="radio" name="pilih[{{ $obj->id }}]" value="a">A. {{ $obj->a }} <br>
                                <input type="radio" name="pilih[{{ $obj->id }}]" value="b">B. {{ $obj->b }} <br>
                                <input type="radio" name="pilih[{{ $obj->id }}]" value="c">C. {{ $obj->c }} <br>
                                <input type="radio" name="pilih[{{ $obj->id }}]" value="d">D. {{ $obj->d }}
                                <input type="radio" class="d-none" name="pilih[{{ $obj->id }}]" value="x" checked>
                            </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"
                                    aria-hidden="true">KIRIM</i></button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $("#waktu").html("--" + "j  " + "--" + "m  " + "--" + "d");

    var selesai = {{$waktu_selesai}};
    var sekarang = {{$waktu_sekarang}};
    var x = setInterval(function() {
    var waktu = selesai - sekarang;
    var jam = Math.floor((waktu % (60 * 60 * 24)) / (60 * 60));
    var menit = Math.floor((waktu % (60 * 60)) / 60);
    var detik = Math.floor((waktu % 60)/1);
    // Display the result in the element with id="demo"
    $("#waktu").html(jam + "j  " + menit + "m  " + detik + "d");
    // If the count down is finished, write some text
    if(waktu < 60){
        $('#bg_waktu').removeClass('bg-white');
        $('#bg_waktu').addClass('bg-warning text-white');
    }

    if (waktu < 0) {
        clearInterval(x);
        simpan();
        $('#waktu').html('Waktu Habis');
    }
    sekarang = sekarang + 1;
    }, 1000);

    function simpan() {
        $('#form').submit();
    }
</script>
@endsection