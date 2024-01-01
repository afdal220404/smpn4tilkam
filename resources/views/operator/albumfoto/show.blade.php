@extends('template.operator')
@section('content')


 <!-- Team Start -->
 <div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">SMP Negeri 4 Tilatang Kamang</h5>
            <h1>{{$album->judul}}</h1>
            <hr style="border: 1px solid #808080; margin-bottom: 20px;">
            <form action="{{ route('album.fotostore', $album->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="co col-md-12 form-group">
                        <label for="exampleInputFile">Foto</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto[]" multiple required>
                                <label class="custom-file-label" for="exampleInputFile">Upload foto pada album ini</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
        <div class="row">
            @foreach($album->fotos as $foto)
            <div class="col-md-6 col-lg-3 text-center team mb-4">
                <div class="team-item rounded overflow-hidden mb-2">
                    <div class="team-img position-relative">
                        <img class="img-fluid" src="{{Storage::url('foto/'.$foto->foto)}}" alt="">
                        <div class="team-social">
                            <form action="{{ route('album.fotodestroy', $foto->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-light btn-square mx-1">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
        <a class="btn btn-primary" href={{route('album.index')}}>Kembali</a>
    </div>
    
</div>
<!-- Team End -->
@endsection
