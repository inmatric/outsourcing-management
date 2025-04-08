<?php

namespace App\View\Components\layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavMenu extends Component
{
    
    /**
     * Create a new component instance.
     */
    public $menuItems;
    public function __construct()
    {
        //
        $this->menuItems = [
            '/' => 'Home',
            'test' => 'test',
            'services' => 'Services',
            'pricing' => 'Pricing',
            'contact' => 'Contact'
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */

    public function render(): View|Closure|string
    {

        return view('components.navbar.nav-menu');
    }
}