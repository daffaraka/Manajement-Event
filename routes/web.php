<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndoregionController;
use App\Http\Controllers\PiuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PengawasController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\NewkegiatanController;
use App\Http\Controllers\NarasumberController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\KategoriNarasumberController;
use App\Http\Controllers\NarasumberKegiatanController;
use App\Http\Controllers\PendaftaranEventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index']);
route::get('/detail-kegiatan/{id}',[HomeController::class,'show'])->name('detailKegiatan.show');

Route::get('/detail/{id}', [HomeController::class,'show']);

Route::get('/daftar-event/{id}', [PendaftaranEventController::class,'pendaftaranEvent'])->name('pendaftaranEvent');

Route::get('/absensi', function () {
    return view('absensi', [
        "title" => "Absensi"
    ]);
});
Route::get('/profile', function () {
    return view('profile', [
        "title" => "Profile Event"
    ]);
})->middleware('auth');

Route::get('/pelaporan/show', function () {
    return view('pelaporan.show', [
        "title" => "Profile Event"
    ]);
}) ->middleware('auth');

// Route::get('/narasumberkegiatan', function () {
//     return view('narasumberkegiatan.index', [
//         "title" => "Home"
//     ]);
// });

// Route::get('/narasumberkegiatan/edit', function () {
//     return view('narasumberkegiatan.edit', [
//         "title" => "Home"
//     ]);
// });


// Route::get('/narasumberkegiatan/show', function () {
//     return view('narasumberkegiatan.show', [
//         "title" => "Home"
//     ]);
// });

// Route::get('/narasumberkegiatan/create', function () {
//     return view('narasumberkegiatan.create', [
//         "title" => "Home"
//     ]);
// });

// Route::get('/narasumberkategori', function () {
//     return view('narasumberkategori.index', [
//         "title" => "Home"
//     ]);
// });
Route::get('/admin-dashboard', function () {
    return view('dashboard-admin', [
        "title" => "Home"
    ]);
});

Route::get('/pelaporan', function () {
    return view('pelaporan.index', [
        "title" => "Home"
    ]);
});
// Route::get('/narasumberkategori/edit', function () {
//     return view('narasumberkategori.edit', [
//         "title" => "Home"
//     ]);
// });
Route::get('/admin/edit', function () {
    return view('admin.edit', [
        "title" => "Home"
    ]);
});


// Route::get('/narasumberkategori/show', function () {
//     return view('narasumberkategori.show', [
//         "title" => "Home"
//     ]);
// });

// Route::get('/narasumberkategori/create', function () {
//     return view('narasumberkategori.create', [
//         "title" => "Home"
//     ]);
// });

Route::get('/piu', function () {
    return view('piu', [
        "title" => "Home"
    ]);
});

Route::get('/piu/edit', function () {
    return view('piu.edit', [
        "title" => "Home"
    ]);
});


Route::get('/piu/show', function () {
    return view('piu.show', [
        "title" => "Home"
    ]);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class,'search'])->name('search');
// Route::get('/form', [IndoregionController::class, 'form'])->name('form');

// Route::post('/getkabupaten', [IndoregionController::class, 'getkabupaten'])->name('getkabupaten');
// // // Route::post('/getkecamatan', [NewkegiatanController::class, 'getkecamatan'])->name('getkecamatan');

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

Route::resource('piu', \App\Http\Controllers\PiuController::class)
    ->middleware('auth');

Route::get('narasumberkegiatan',[NarasumberKegiatanController::class, 'provinsi']);

Route::get('getCity',[NarasumberKegiatanController::class, 'getCity'])->name('getCity');
    
Route::resource('post', PostController::class);
Route::resource('kegiatan', NewkegiatanController::class)->except(['show']);


Route::resource('peserta',PesertaController::class);

Route::resource('pertanyaan', PertanyaanController::class);
Route::get('daftar',[DropdownController::class, 'index']);
Route::get('daftar',[DropdownController::class, 'daftar']);
Route::get('profile',[DropdownController::class, 'profile']);

Route::get('/kegiatan', function () {
    return view('/kegiatan', [
        "title" => "Kegiatan"
    ]);
});
Route::resource('/kegiatan',\App\Http\Controllers\KegiatanController::class)->except(['update']);
Route::get('/kegiatan/{id}/delete', [KegiatanController::class,'destroy'])->name('kegiatan.destroy');
Route::post('kegiatan/{id}/update',[KegiatanController::class,'update'])->name('kegiatan.update');
Route::post('/getkota',[KegiatanController::class,'getkota'])->name('getkota');
Route::post('/uploadFile', [KegiatanController::class,'uploadFile'])->name('uploadFile');


Route::post('/daftar-getkota',[HomeController::class,'getkota'])->name('daftar.getkota');



Route::get('/kategorinarasumber', function () {
    return view('/kategorinarasumber', [
        "title" => "Kategori Narasumber"
    ]);
});

Route::resource('/kategorinarasumber',\App\Http\Controllers\KategoriNarasumberController::class)->except(['show','update']);
Route::get('/kategorinarasumber/{id}/delete',[KategoriNarasumberController::class,'destroy'])->name('kategori.delete');
Route::get('/narasumber', function () {
    return view('/narasumber', [
        "title" => "Narasumber"
    ]);
});

Route::resource('/narasumber',\App\Http\Controllers\NarasumberController::class)->except(['update']);
// Route::post('/getkota',\App\Http\Controllers\NarasumberController::class,'getkota')->name('getkota');

Route::get('/usereo', function () {
    return view('/usereo', [
        "title" => "User EO"
    ]);
});
Route::resource('/usereo', App\Http\Controllers\UserEoController::class)->except(['show','update']);


Route::get('/eo', function () {
    return view('/eo', [
        "title" => "EO"
    ]);
});
Route::resource('/eo',\App\Http\Controllers\EOController::class)->except(['show','update']);

// Pendaftaran Controller
Route::post('/daftar-event/{id}/daftar', [PendaftaranEventController::class,'daftarEvent'])->name('pendaftaranEvent.daftar');