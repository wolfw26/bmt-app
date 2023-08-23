<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Beranda extends Component
{
    public function render()
    {
        return view('livewire.admin.beranda')
            ->extends('admin.dasboard');
    }
}
