<?php

namespace App\Http\Livewire\Helpers;

use Livewire\Component;

#[Layout('layouts.app')]
class LoadingSpinner extends Component
{
    public function render()
    {
        return view('livewire.helpers.loading-spinner');
    }
}
