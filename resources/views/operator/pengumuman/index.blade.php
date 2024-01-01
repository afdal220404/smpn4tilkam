@extends('template.operator')
@section('content') 
@inject('kepsekcontroller', 'App\Http\Controllers\kepsekcontroller')
   <!-- Header Start -->
   <div class="container-fluid page-header" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
            <h3 class="display-4 text-white text-uppercase">Blog</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Blog</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Blog Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <a class="btn btn-primary" style="margin-bottom: 50px" href={{route('pengumuman.tambah')}}>Tambah Pengumuman Baru</a>
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Pengumuman Terbaru </h3>
                    <hr style="border: 1px solid #808080; margin-bottom: 20px;">
                    @foreach ($pengumuman as $data)
                    <a class="d-flex align-items-center text-decoration-none mb-3" href={{route('pengumuman.show', $data->id) }}>
                        <div class="pl-3">
                            <h6 class="m-1">{{$data->judul}}</h6>
                            <small>{{$data->created_at}}</small>
                        </div>
                    </a>
                    <hr style="border: 1px solid #808080; margin-bottom: 20px;">
                    @endforeach
                </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection