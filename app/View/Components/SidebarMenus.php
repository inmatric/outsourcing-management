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
            [
                'name' => 'Cooperations',
                'href' => '/cooperations',
            ],
            [
                'name' => 'employee-contract',
                'href' => '/employee-contract',
            ],
            [
                'name' => 'location-division',
                'href' => '/location-division',
            ],
            [
                'name' => 'processing_wd',
                'href' => '/processing_wd',
            ],
            // Tambah menu lainnya di sini
        ];
    }

    public function render()
    {
        return view('components.sidebar-menus');
    }
}
