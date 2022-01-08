@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('admin/assets/img/depan.jpeg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-lg-block">
                            <h5>E-Learning</h5>
                            <p>SMA Negeri 2 Tanjung Jabung Timur</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('admin/assets/img/depansma.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block" style="text-align: left">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('admin/assets/img/tiga.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block" style="text-align: left">

                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

@endsection
