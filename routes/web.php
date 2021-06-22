<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AgamaController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\DonasiController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KabupatenController;
use App\Http\Controllers\Admin\KecamatanController;
use App\Http\Controllers\Admin\KelurahanController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProfesiController;
use App\Http\Controllers\Admin\ProgramDonasiController;
use App\Http\Controllers\Admin\ProvinsiController;
use App\Http\Controllers\Admin\RekeningController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SaranController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Relawan\RelawanDonasiController;
use App\Http\Controllers\Relawan\RelawanProgramBeritaController;
use App\Http\Controllers\Relawan\RelawanProgramDonasiController;
use App\Http\Controllers\Relawan\RelawanRekeningController;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Guest\FormDonasi\FormDonasi;
use App\Http\Livewire\Guest\Saran\KirimSaran;
use App\Http\Livewire\Guest\KonfirmasiDonasi\KonfirmasiDonasi;
use App\Http\Livewire\Guest\PenggalanganDana\PenggalanganDana;
use App\Http\Livewire\Guest\PostinganProgram\PostinganProgram;
use App\Models\ProgramBerita;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () { return view('index');})->name('index');

Route::group(['middleware' => ['guest']], function() {
    Route::get('/register', Register::class)->name('register');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('perizinan', PermissionController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Roles
    Route::resource('peran', RoleController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Agama
    Route::resource('agama', AgamaController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Bank
    Route::resource('bank', BankController::class, ['except' => ['store', 'update', 'destroy']]);

    // Profesi
    Route::resource('profesi', ProfesiController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Provinsi
    Route::resource('provinsi', ProvinsiController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Kabupaten
    Route::resource('kabupaten', KabupatenController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Kecamatan
    Route::resource('kecamatan', KecamatanController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Kelurahan
    Route::resource('kelurahan', KelurahanController::class, ['except' => ['store', 'update', 'destroy', 'show']]);

    // Rekening
    Route::resource('rekening', RekeningController::class, ['except' => ['store', 'update', 'destroy']]);

    // Program Donasi
    Route::resource('program-donasi', ProgramDonasiController::class, ['except' => ['store', 'update', 'destroy']]);

    // Program Berita
    Route::resource('program-berita', ProgramBerita::class, ['except' => ['store', 'update', 'destroy']]);

    // Donasi
    Route::resource('donasi', DonasiController::class, ['except' => ['store', 'update', 'destroy']]);

    // Saran
    Route::resource('saran', SaranController::class, ['except' => ['store', 'update', 'destroy', 'edit']]);
});

Route::group(['prefix' => 'relawan', 'as' => 'relawan.', 'middleware' => ['auth', 'verified']], function () {
    // Program Donasi
    Route::get('/', function () { return view('relawan.home');})->name('home');
    Route::resource('program-berita', RelawanProgramBeritaController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::resource('donasi', RelawanDonasiController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::resource('program-donasi', RelawanProgramDonasiController::class, ['except' => ['store', 'update', 'destroy']]);
    Route::resource('rekening', RelawanRekeningController::class, ['except' => ['store', 'update', 'destroy']]);

});


Route::get('/saran', KirimSaran::class)->name('saran');
Route::get('/konfirmasi-donasi', KonfirmasiDonasi::class)->name('konfirmasi-donasi');
Route::get('/penggalangan-dana', PenggalanganDana::class)->name('penggalangan-dana');
Route::get('/penggalangan-dana/{programDonasi}', PostinganProgram::class)->name('penggalangan-dana.program');
Route::get('/penggalangan-dana/donasi/{programDonasi}', FormDonasi::class)->name('penggalangan-dana.donasi');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth','verified']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

require __DIR__.'/auth.php';
