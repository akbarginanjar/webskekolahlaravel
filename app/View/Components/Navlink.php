<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navlink extends Component
{
    /**
     * Create a new component instance.
     */

    public $url, $name;

    public function __construct()
    {
        $this->url;
        $this->name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navlink');
    }
}