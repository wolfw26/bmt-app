<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputs extends Component
{
    /**
     * Create a new component instance.
     */
    public $inputData;
    public function __construct($inputData)
    {
        $this->inputData = $inputData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputs');
    }
}
