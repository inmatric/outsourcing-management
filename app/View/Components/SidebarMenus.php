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
                'name' => 'Employee',
                'href' => '/employes',
            ],
            [
                'name' => 'Employee Contract',
                'href' => '/employee-contract',
            ],
            [
                'name' => 'Work Table',
                'href' => '/work_table',
            ],
            [
                'name' => 'Work Equipment',
                'href' => '/work_equipment',
            ],
            [
                'name' => 'SOP',
                'href' => '/worktool',
            ],
            [
                'name' => 'Location',
                'href' => '/location',
            ],         
            [
                'name' => 'Location Division',
                'href' => '/location-division',
            ],            
            [
                'name' => 'Attendance',
                'href' => '/attendance',
            ],            
            [
                'name' => 'Work Tracking',
                'href' => '/processing_wd',
            ],
            [
                'name' => 'Complaint',
                'href' => '/complaints',
            ],
            [
                'name' => 'Complaint Resolutions',
                'href' => '/complaint_resolution',
            ],            
            [
                'name' => 'Employee Evaluations',
                'href' => '/employeeevaluation',
            ],
            [
                'name' => 'Offence',
                'href' => '/offence',
            ],            
            [
                'name' => 'Report',
                'href' => '/workreport',
            ],
            [
                'name' => 'Lost/Found',
                'href' => '/lostitem',
            ],            
            [
                'name' => 'Permission',
                'href' => '/permission',
            ],            
            [
                'name' => 'Fund',
                'href' => '/funds',
            ],
            // [
            //     'name' => 'Lost & Found Item',
            //     'href' => '/lostitem',
            // ],
            // Tambah menu lainnya di sini
        ];
    }

    public function render()
    {
        return view('components.sidebar-menus');
    }
}
