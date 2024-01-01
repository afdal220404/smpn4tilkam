@extends('template.master')
@section('content')


 <!-- Team Start -->
 <div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">SMP Negeri 4 Tilatang Kamang</h5>
            <h1>{{$album->judul}}</h1>
            <hr style="border: 1px solid #808080; margin-bottom: 20px;">
        </div>
        <div class="row">
            @foreach($album->fotos as $foto)
            <div class="col-md-6 col-lg-3 text-center team mb-4">
                <div class="team-item rounded overflow-hidden mb-2">
                    <div class="team-img position-relative">
                        <img class="img-fluid" src="{{Storage::url('foto/'.$foto->foto)}}" alt="">
                        <div class="team-social">
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
        <a class="btn btn-primary" href={{route('album.index2')}}>Kembali</a>
    </div>
    
</div>
<!-- Team End -->
@endsection
