@extends('template.master')
@section('content')
    @inject('beritacontroller', 'App\Http\Controllers\beritacontroller')

    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Guru</h5>
                <h1>SMP Negeri 4 Tilatang Kamang</h1>
            </div>
            <div class="row">
                @foreach ($guru as $data)
                    <div class="col-md-6 col-lg-3 text-center team mb-4">
                        <div class="team-item rounded overflow-hidden mb-2">
                            <div class="team-img position-relative">
                                <img class="img-fluid" src="{{ Storage::url('guru/' . $data->foto) }}" alt="">
                            </div>
                            <div class="bg-secondary p-4">
                                <h5>{{ $data->nama }}</h5>
                                <p class="m-0">{{ $data->nip }}</p>
                                <p class="m-0">{{ $data->mapel }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <!-- Team End -->
@endsection
