@extends('template.master')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Berita</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Berita</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5 ">
            <br>
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">berita</h5>
                <h1>SMP Negeri 4 Tilatang Kamang</h1>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row pb-3">
                        @foreach ($berita as $data)
                        <div class="col-lg-6 mb-4">
                            <div class="blog-item position-relative overflow-hidden rounded mb-2">
                                <img class="img-fluid" src="{{ Storage::url('berita/' . $data->foto) }}" alt="">
                                <a class="blog-overlay text-decoration-none" href="{{ route('berita.show2', $data->id) }}">
                                    <h5 class="text-white mb-3">{{ $data->judul }}</h5>
                                    <p class="text-primary m-0">{{ $data->created_at }}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        </div>
                        <a href="{{ route('viewer.welcome') }}" class="btn btn-primary">Kembali</a>
                    </div>


                    <div class="col-lg-4 mt-5 mt-lg-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
