@extends('template.operator')
@section('content')
<br>
<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Ubah Data prestasi</h3>
        </div>
        <form action="{{ route('prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="siswa" name="siswa" value="{{$prestasi->siswa }}" placeholder="Masukkan Nama Siswa">
                    </div>
                </div>
                <div class="row">
                    <div class="co col-md-12 form-group">
                        <label for="exampleInputFile">Foto</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="exampleInputFile">Pilih Foto</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label>NIP</label>
                        <input type="text" class="form-control" id="namaprestasi" name="namaprestasi" placeholder="Masukkan Prestasi" value="{{ $prestasi->namaprestasi}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label>Peringkat</label>
                        <input type="text" class="form-control" id="peringkat" name="peringkat" placeholder="Masukkan Peringkat" value="{{ $prestasi->peringkat}}">

                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label>Tingkat</label>
                        <input type="text" class="form-control" id="tingkat" name="tingkat" placeholder="Masukkan tingkat" value="{{ $prestasi->tingkat}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal" value="{{ $prestasi->tanggal}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-12 form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi" value="{{ $prestasi->deskripsi}}">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
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