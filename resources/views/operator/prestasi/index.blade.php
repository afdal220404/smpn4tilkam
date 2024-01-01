@extends('template.operator')
@section('content')
@inject('beritacontroller', 'App\Http\Controllers\beritacontroller')

 <!-- Team Start -->
 <div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Prestasi</h5>
            <h1>Siswa Siswi SMP Negeri 4 Tilatang Kamang</h1>
            <hr>
            <br>
            <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href={{route('prestasi.tambah')}}>Tambah Data prestasi</a>
        </div>
        <div class="row">
            @foreach($prestasi as $data)
            <div class="col-md-6 col-lg-3 text-center team mb-4">
                <div class="team-item rounded overflow-hidden mb-2">
                    <div class="team-img position-relative">
                        <img class="img-fluid" src="{{Storage::url('prestasi/'.$data->foto)}}" alt="">
                        <div class="team-social">
                            <a class="btn btn-outline-light btn-square mx-1" href="{{ route('prestasi.edit', $data->id) }}"><i class="bi bi-pen"></i></a>
                            <a class="btn btn-outline-light btn-square mx-1" href="{{ route('prestasi.show', $data->id) }}"><i class="bi bi-info-circle-fill"></i></a>
                            <form action="{{ route('prestasi.destroy', $data->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-light btn-square mx-1">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="bg-secondary p-4">
                        <h5>{{$data->siswa}}</h5>
                        <p class="m-0"><i class="bi bi-star-fill"></i> {{$data->namaprestasi}}</p>
                        <p class="m-0"><i class="bi bi-geo-alt-fill"></i> {{$data->tingkat}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->
@endsection
