<?php

namespace App\Http\Livewire\Helpers;

use Livewire\Component;

class ButtonSpinner extends Component
{
    public $password = '';
    public $type;
    public $class;
    public $label;
    public $isDisabled;

    public function updatedPassword()
    {
        $this->isDisabled = strlen($this->password) < 6;
    }

    public function render()
    {
        return view('livewire.helpers.button-spinner');
    }
}
// <livewire:button-with-loading
//     :type="'submit'"
//     :class="'btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0'"
//     :label="'Log in'"
//     wire:loading.attr="disabled"
// />
