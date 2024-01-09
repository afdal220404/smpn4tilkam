@extends('template.master')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#header-carousel" data-slide-to="1"></li>
                <li data-target="#header-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/404874331_6921257137942149_3454566697906391415_n.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">-Sekolah Penggerak-</h5>
                            <h1 class="display-3 text-white mb-md-4">SMPN 4 Tilatang Kamang</h1>
                            
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/335155181_208209915216168_7309944144102663783_n.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">-Sekolah Penggerak-</h5>
                            <h1 class="display-3 text-white mb-md-4">SMPN 4 Tilatang Kamang</h1>
                            
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/329778838_719286189752112_8820704587694228604_n.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">-Sekolah Penggerak-</h5>
                            <h1 class="display-3 text-white mb-md-4">SMPN 4 Tilatang Kamang</h1>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Category Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5 te"  >
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Subjects</h5>
                <h1>Explore Fitur Web</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="img/visi&misi.png" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href={{route('visimisi.index2')}}>
                            <h4 class="text-white font-weight-medium">Visi & Misi</h4>
                            
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="img/prestasi.png" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href={{route('prestasi.index2')}}>
                            <h4 class="text-white font-weight-medium">Prestasi Sekolah</h4>
                            
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="img/kepalasekolah.png" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href={{route('kepsek.index2')}}>
                            <h4 class="text-white font-weight-medium">Kepala Sekolah</h4>
                            
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="img/galeri.png" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href={{route('album.index2')}}>
                            <h4 class="text-white font-weight-medium">Galeri</h4>
                            
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="img/guru.png" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href={{route('guru.index2')}}>
                            <h4 class="text-white font-weight-medium">Guru</h4>
                            
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="img/pengumuman.png" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href={{route('pengumuman.index2')}}>
                            <h4 class="text-white font-weight-medium">Pengumuman</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="img/berita.png" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href={{route('berita.index2')}}>
                            <h4 class="text-white font-weight-medium">Berita</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category Start -->




  




   @endsection