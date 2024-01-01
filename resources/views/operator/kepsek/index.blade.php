@extends('template.operator')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Kepala Sekolah</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('kepsek.index') }}">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Kepala Sekolah</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    
    @foreach ($kepsek as $data)
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <img class="img-fluid rounded mb-4 mb-lg-0" src="{{ Storage::url('kepsek/' . $data->foto) }}"
                            alt="" width="200" height="134">
                    </div>
                    <div class="col-lg-7">
                        <div class="text-left mb-4">
                            <h1>{{ $data->nama }}</h1>
                            <h5>{{ $data->nip }}</h5>
                        </div>
                        <br>
                        <br>

                    </div>
                    <br>
                    <p class="text-justify" style="margin-top: 50px;">{{ $data->teks }}</p>
                </div>
                <a href="{{ route('kepsek.index') }}" class="btn btn-primary">Kembali</a>
                <br>
                <br>
                <a class="btn btn-primary" href={{ route('kepsek.edit', $data->id) }}>update data kepala sekolah</a>
            </div>
        </div>
    @endforeach
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
