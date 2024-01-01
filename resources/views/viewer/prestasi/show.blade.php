@extends('template.master')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">prestasi</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('prestasi.index') }}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">prestasi</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="{{ Storage::url('prestasi/' . $prestasi->foto) }}" alt="">
                </div>
                <div class="col-lg-7">
                    <div class="text-left mb-4">
                        <h1>{{ $prestasi->siswa }}</h1>
                        <p>{{ $prestasi->tanggal }}</p>
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;"><i class="bi bi-star-fill"></i> {{ $prestasi->namaprestasi}}</h5>
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;"><i class="bi bi-trophy-fill"></i> {{ $prestasi->peringkat}}</h5>
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;"><i class="bi bi-geo-alt-fill"></i> {{ $prestasi->tingkat}}</h5>
                        
                    </div>
                    <h5>{{ $prestasi->deskripsi }}</h5>
                    <br>
                    <br>
                    <a href="{{ route('prestasi.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('js')
    <script src="{{ url('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            $('#deskripsi_form').summernote()
        })
    </script>
@endsection
