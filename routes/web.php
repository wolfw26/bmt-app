<?php

use App\Http\Controllers\admin\logout;
use App\Http\Livewire\Pages\Tables;
use App\View\Components\navbar;
use App\Http\Livewire\Admin\Karyawan;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\DataAdmin;
use App\Http\Livewire\Admin\Jabatan;
use App\Http\Livewire\Peserta\Daftar;
use App\Http\Livewire\Peserta\Login;
use App\Http\Livewire\Admin\Daftar as admDaftar;
use App\Http\Livewire\Admin\Login as admLogin;
use App\Http\Livewire\Peserta\DataDiri;
use App\Http\Livewire\Peserta\Home;

// Route peserta
Route::get('/peserta/daftar', Daftar::class)->name('daftar');
Route::get('/', Login::class)->name('login');
// route admin
Route::get('/a/daftar', admDaftar::class)->name('adm.daftar');
Route::get('/a/login', admLogin::class)->name('adm.login');
Route::get('/logout', [logout::class, 'logout'])->name('logout');



// ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/a', function () {
        return view('livewire.admin.beranda', ['title' => 'ADMIN']);
    })->name('beranda');
    Route::get('/a/karyawan', Karyawan::class)->name('admin.karyawan');
    Route::get('/a/jabatan', Jabatan::class)->name('admin.jabatan');
    Route::get('/a/data_admin', DataAdmin::class)->name('admin.dataadmin');
    Route::get('/a/tables', Tables::class)->name('tables');
    Route::get('/a/billing', function () {
        return view('livewire.admin.beranda', ['title' => 'BILLING']);
    })->name('billing');

    Route::get('/a/vr', function () {
        return view('livewire.admin.beranda', ['title' => 'VR']);
    })->name('vr');
});
// /ADMIN
// PESERTA
Route::middleware(['auth', 'role:peserta'])->group(function () {
    Route::get('/home', Home::class)->name('peserta.home');
    Route::get('/data-diri', DataDiri::class)->name('peserta.data-diri');
});
