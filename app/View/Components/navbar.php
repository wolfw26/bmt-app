<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public function __construct($title)
    {
        $this->title = $title;
    }

    public function logout()
    {
        Auth::logout();

        return Redirect::route('adm.login'); // Redirect to your desired route after logout
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
