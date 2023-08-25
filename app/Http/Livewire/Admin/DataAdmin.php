<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class DataAdmin extends Component
{
    public function render()
    {
        return view('livewire.admin.data-admin')->extends('layouts', ['title' => 'DATA ADMIN']);
    }
}
