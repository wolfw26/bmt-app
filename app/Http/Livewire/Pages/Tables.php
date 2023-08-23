<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Tables extends Component
{
    public function render()
    {
        return view('livewire.pages.tables')->extends('layouts',[
            'title' => 'TABLES'
        ]);
    }
}
