<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\gurucontroller;
use App\Http\Controllers\kepsekcontroller;
use App\Http\Controllers\prestasicontroller;
use App\Http\Controllers\pengumumancontroller;
use App\Http\Controllers\albumfotocontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\misicontroller;
use App\Http\Controllers\visimisicontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('viewer.welcome');
})->name('viewer.welcome');

// Route::get('login', [logincontroller::class, 'index'])->name('login');;

Route::get('/login', [logincontroller::class, 'index'])->name('index')->middleware('cekviewer');
Route::post('/login/proses', [logincontroller::class, 'login'])->name('login')->middleware('cekviewer');

Route::get('/logout', [logincontroller::class, 'logout'])->name('logout');


Route::get('operator', function(){
    return view('operator.welcome');
})->middleware('cekoperatorlogin');

//==================================================================================
Route::get('visimisi.index', [visimisicontroller::class, 'index'])->name('visimisi.index');

Route::get('visimisi.index2', [visimisicontroller::class, 'index2'])->name('visimisi.index2');

Route::get('visimisi.tambahvisi', [visimisicontroller::class, 'createvisi'])->name('visimisi.tambahvisi')->middleware('cekoperatorlogin');
Route::get('visimisi.tambahmisi', [visimisicontroller::class, 'createmisi'])->name('visimisi.tambahmisi')->middleware('cekoperatorlogin');
Route::get('visimisi.tambahtujuan', [visimisicontroller::class, 'createtujuan'])->name('visimisi.tambahtujuan')->middleware('cekoperatorlogin');

Route::post('visimisi.storevisi', [visimisicontroller::class, 'storevisi'])->name('visimisi.storevisi')->middleware('cekoperatorlogin');
Route::post('visimisi.storemisi', [visimisicontroller::class, 'storemisi'])->name('visimisi.storemisi')->middleware('cekoperatorlogin');
Route::post('visimisi.storetujuan', [visimisicontroller::class, 'storetujuan'])->name('visimisi.storetujuan')->middleware('cekoperatorlogin');

Route::delete('visimisi.destroyvisi/{id}', [visimisicontroller::class, 'destroyvisi'])->name('visimisi.destroyvisi')->middleware('cekoperatorlogin');
Route::delete('visimisi.destroymisi/{id}', [visimisicontroller::class, 'destroymisi'])->name('visimisi.destroymisi')->middleware('cekoperatorlogin');
Route::delete('visimisi.destroytujuan/{id}', [visimisicontroller::class, 'destroytujuan'])->name('visimisi.destroytujuan')->middleware('cekoperatorlogin');

//==================================================================================
Route::get('tentangsekolah', function(){
    return view('operator.tentangsekolah');
});

Route::resource('guru',gurucontroller::class);

Route::get('guru.tambah', [gurucontroller::class, 'create'])->name('guru.tambah')->middleware('cekoperatorlogin');

Route::get('guru.index', [gurucontroller::class, 'index'])->name('guru.index')->middleware('cekoperatorlogin');

Route::get('guru.index2', [gurucontroller::class, 'index2'])->name('guru.index2');

Route::post('guru.store', [gurucontroller::class, 'store'])->name('guru.store')->middleware('cekoperatorlogin');

Route::put('guru.update/{id}', [gurucontroller::class, 'update'])->name('guru.update')->middleware('cekoperatorlogin');

Route::get('guru.show/{id}', [gurucontroller::class, 'show'])->name('guru.show')->middleware('cekoperatorlogin');

Route::delete('guru.destroy/{id}', [gurucontroller::class, 'destroy'])->name('guru.destroy')->middleware('cekoperatorlogin');
//==================================================================================

Route::resource('berita',beritacontroller::class);

Route::get('berita.tambah', [BeritaController::class, 'create'])->name('berita.tambah')->middleware('cekoperatorlogin');

Route::get('berita.index', [BeritaController::class, 'index'])->name('berita.index')->middleware('cekoperatorlogin');

Route::get('berita.index2', [BeritaController::class, 'index2'])->name('berita.index2');

Route::post('berita.store', [BeritaController::class, 'store'])->name('berita.store')->middleware('cekoperatorlogin');

Route::put('berita.update/{id}', [BeritaController::class, 'update'])->name('berita.update')->middleware('cekoperatorlogin');

Route::get('berita.show/{id}', [BeritaController::class, 'show'])->name('berita.show')->middleware('cekoperatorlogin');

Route::get('berita.show/{id}', [BeritaController::class, 'show2'])->name('berita.show2');

Route::delete('berita.destroy/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy')->middleware('cekoperatorlogin');

//===========================================================================================
Route::resource('prestasi',prestasicontroller::class);

Route::get('prestasi.tambah', [prestasicontroller::class, 'create'])->name('prestasi.tambah')->middleware('cekoperatorlogin');

Route::get('prestasi.index', [prestasicontroller::class, 'index'])->name('prestasi.index')->middleware('cekoperatorlogin');

Route::get('prestasi.index2', [prestasicontroller::class, 'index2'])->name('prestasi.index2');

Route::post('prestasi.store', [prestasicontroller::class, 'store'])->name('prestasi.store')->middleware('cekoperatorlogin');

Route::put('prestasi.update/{id}', [prestasicontroller::class, 'update'])->name('prestasi.update')->middleware('cekoperatorlogin');

Route::get('prestasi.show/{id}', [prestasicontroller::class, 'show'])->name('prestasi.show')->middleware('cekoperatorlogin');

Route::get('prestasi.show/{id}', [prestasicontroller::class, 'show2'])->name('prestasi.show2');

Route::delete('prestasi.destroy/{id}', [prestasicontroller::class, 'destroy'])->name('prestasi.destroy')->middleware('cekoperatorlogin');


//===========================================================================================

Route::resource('kepsek',kepsekcontroller::class);

Route::get('kepsek.tambah', [kepsekcontroller::class, 'create'])->name('kepsek.tambah')->middleware('cekoperatorlogin');

Route::get('kepsek.index', [kepsekcontroller::class, 'index'])->name('kepsek.index')->middleware('cekoperatorlogin');
Route::get('kepsek.index2', [kepsekcontroller::class, 'index2'])->name('kepsek.index2');

Route::post('kepsek.store', [kepsekcontroller::class, 'store'])->name('kepsek.store')->middleware('cekoperatorlogin');

Route::put('kepsek.update/{id}', [kepsekcontroller::class, 'update'])->name('kepsek.update')->middleware('cekoperatorlogin');

Route::get('kepsek.show/{id}', [kepsekcontroller::class, 'show'])->name('kepsek.show')->middleware('cekoperatorlogin');

Route::delete('kepsek.destroy/{id}', [kepsekcontroller::class, 'destroy'])->name('kepsek.destroy');

//===========================================================================================
Route::resource('pengumuman', PengumumanController::class);

Route::get('pengumuman.tambah', [pengumumancontroller::class, 'create'])->name('pengumuman.tambah')->middleware('cekoperatorlogin');

Route::get('pengumuman.index', [pengumumancontroller::class, 'index'])->name('pengumuman.index')->middleware('cekoperatorlogin');
Route::get('pengumuman.index2', [pengumumancontroller::class, 'index2'])->name('pengumuman.index2');

Route::post('pengumuman.store', [pengumumancontroller::class, 'store'])->name('pengumuman.store')->middleware('cekoperatorlogin');

Route::put('pengumuman.update/{id}', [pengumumancontroller::class, 'update'])->name('pengumuman.update')->middleware('cekoperatorlogin');

Route::get('pengumuman.show/{id}', [pengumumancontroller::class, 'show'])->name('pengumuman.show')->middleware('cekoperatorlogin');
Route::get('pengumuman.show/{id}', [pengumumancontroller::class, 'show2'])->name('pengumuman.show2');

Route::delete('pengumuman.destroy/{id}', [pengumumancontroller::class, 'destroy'])->name('pengumuman.destroy')->middleware('cekoperatorlogin');

//===========================================================================================
Route::resource('album', albumfotocontroller::class);

Route::get('album.tambah', [albumfotocontroller::class, 'create'])->name('album.tambah')->middleware('cekoperatorlogin');

Route::get('album.index', [albumfotocontroller::class, 'index'])->name('album.index')->middleware('cekoperatorlogin');
Route::get('album.index2', [albumfotocontroller::class, 'index2'])->name('album.index2');

Route::post('album.store', [albumfotocontroller::class, 'store'])->name('album.store')->middleware('cekoperatorlogin');

Route::post('album.fotostore/{id}', [albumfotocontroller::class, 'fotostore'])->name('album.fotostore')->middleware('cekoperatorlogin');

Route::put('album.update/{id}', [albumfotocontroller::class, 'update'])->name('album.update')->middleware('cekoperatorlogin');

Route::get('album.show/{id}', [albumfotocontroller::class, 'show'])->name('album.show')->middleware('cekoperatorlogin');
Route::get('album.show/{id}', [albumfotocontroller::class, 'show2'])->name('album.show2');

Route::delete('album.destroy/{id}', [albumfotocontroller::class, 'destroy'])->name('album.destroy')->middleware('cekoperatorlogin');

Route::delete('album.fotodestroy/{id}', [albumfotocontroller::class, 'fotodestroy'])->name('album.fotodestroy')->middleware('cekoperatorlogin');












