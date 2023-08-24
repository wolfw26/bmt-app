<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Karyawan extends Component
{
    public function render()
    {
        return view('livewire.admin.karyawan')->extends('layouts',['title' => 'KARYAWAN']);
    }
}
