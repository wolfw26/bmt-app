<?php

use App\Http\Livewire\Pages\Tables;
use App\Http\Livewire\Admin\Karyawan;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\DataAdmin;
use App\Http\Livewire\Admin\Jabatan;

// ADMIN

Route::get('/', function () {
    return view('livewire.admin.beranda', ['title' => 'ADMIN']);
})->name('beranda');

Route::get('/karyawan', Karyawan::class)->name('admin.karyawan');
Route::get('/jabatan', Jabatan::class)->name('admin.jabatan');
Route::get('/data_admin', DataAdmin::class)->name('admin.dataadmin');



Route::get('/tables', Tables::class)->name('tables');
Route::get('/billing', function () {
    return view('livewire.admin.beranda', ['title' => 'BILLING']);
})->name('billing');

Route::get('/vr', function () {
    return view('livewire.admin.beranda', ['title' => 'VR']);
})->name('vr');
// /ADMIN
