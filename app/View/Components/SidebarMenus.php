<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarMenus extends Component
{
    public $menus;

    public function __construct()
    {
        $this->menus = [
            [
                'name' => 'Dashboard',
                'href' => '/dashboard',
            ],
            [
                'name' => 'Users',
                'href' => '/users',
            ],
            // Tambah menu lainnya di sini
        ];
    }

    public function render()
    {
        return view('components.sidebar-menus');
    }
}
