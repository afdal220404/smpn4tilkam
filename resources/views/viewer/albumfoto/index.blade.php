@extends('template.master')
@section('content')


 <!-- Team Start -->
 <div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">SMP Negeri 4 Tilatang Kamang</h5>
            <h1>Album Foto</h1>
            <hr style="border: 1px solid #808080; margin-bottom: 20px;">
        </div>
        <div class="row">
            @foreach($album as $data)
            <div class="col-md-6 col-lg-3 text-center team mb-4">
                <div class="team-item rounded overflow-hidden mb-2">
                    <div class="team-img position-relative">
                        <img class="img-fluid" src="{{Storage::url('album/'.$data->sampul)}}" alt="">
                        <div class="team-social">
                            <a class="btn btn-outline-light btn-square mx-1" href="{{ route('album.show2', $data->id) }}"><i class="bi bi-info-circle-fill"></i></a>
                        </div>
                    </div>
                    <div class="bg-secondary p-4">
                        <h5>{{$data->judul}}</h5>
                        <p class="m-0">{{$data->created_at}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="btn btn-primary" href={{route('viewer.welcome')}}>Kembali</a>
    </div>
    
</div>
<!-- Team End -->
@endsection
