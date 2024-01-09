@extends('template.operator')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Visi & Misi</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Visi & Misi</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <h1 class="mb-5 text-center">VISI DAN MISI</h1>
                        <h1 class="mb-5 text-center">SMP Negeri 4 Tilatang Kamang</h1>
                        <img class="img-fluid rounded w-100 mb-4" src="img/visimisi.jpg" alt="Image">
                        <h3 class="text-primary mb-3">Visi</h3>
                        <h5><i>" Terujudnya siswa berkarakter, berprestasi, berwawasan kebangsaan dan Global yang ramah
                                lingkungan berdasarkan iman dan Taqwa "</i></h5>
                        <br>
                        <h5>Indikator :</h5>
                        <a class="btn btn-primary " href={{ route('visimisi.tambahvisi') }}>tambah indikator</a></p>
                        @foreach ($visi as $item)
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-justify" style="margin-right: 10px;">{{ $loop->index + 1 }}. {{ $item->visi }}</p>
                                <form action="{{ route('visimisi.destroyvisi', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-primary btn-square mx-1 "  ><i
                                            class="bi bi-trash-fill"></i></button>
                                </form>
                            </div>
                            <hr>
                        @endforeach



                        <img class="img-fluid rounded w-50 float-left mr-4 mb-3" src="img/visimisi2.jpg" alt="Image">
                        <h3 class="text-primary mb-3">Misi</h3>
                        <a class="btn btn-primary " href={{ route('visimisi.tambahmisi') }}>tambah misi</a></p>
                        @foreach ($misi as $item)
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-justify" style="margin-right: 10px;">{{ $loop->index + 1 }}. {{ $item->misi }}</p>
                                <form action="{{ route('visimisi.destroymisi', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-primary btn-square mx-1 "  ><i
                                            class="bi bi-trash-fill"></i></button>
                                </form>
                            </div>
                            <hr>
                        @endforeach

                        <img class="img-fluid rounded w-100 mb-4" src="img/tujuan.jpg" alt="Image">
                        <h3 class="text-primary mb-3">Tujuan</h3>
                        <a class="btn btn-primary " href={{ route('visimisi.tambahtujuan') }}>tambah tujuan</a></p>
                        @foreach ($tujuan as $item)
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-justify" style="margin-right: 10px;">{{ $loop->index + 1 }}. {{ $item->tujuan }}</p>
                            <form action="{{ route('visimisi.destroytujuan', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-primary btn-square mx-1 "  ><i
                                        class="bi bi-trash-fill"></i></button>
                            </form>
                        </div>
                        <hr>
                    @endforeach
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                </div>
            </div>
            <a href="{{ route('viewer.welcome') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    <!-- Detail End -->
@endsection
