<?php

use App\Http\Livewire\Pages\Tables;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('livewire.admin.beranda', ['title' => 'ADMIN']);
})->name('beranda');

Route::get('/tables', Tables::class)->name('tables');

Route::get('/billing', function () {
    return view('livewire.admin.beranda', ['title' => 'BILLING']);
})->name('billing');

Route::get('/vr', function () {
    return view('livewire.admin.beranda', ['title' => 'VR']);
})->name('vr');
