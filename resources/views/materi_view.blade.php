{{-- @extends('layouts.master')
@section('content')

@endsection --}}
@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <li aria-hidden="true"> Manajemen Materi </li>
                        </h3>
                        <div class="col-12 text-right">
                            <a href="{{ url('guru/materi/index') }}" class="btn btn-primary" href="#" role="button"><i
                                    class="fa fa-fast-backward" aria-hidden="true"> Kembali</i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p>
                            <iframe src="{{ Storage::url($obj->file_materi) }}"
                                style="width: 1100px; height:800px"></iframe>
                        </p>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
