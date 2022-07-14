<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardCtrl extends Controller
{
    public function dashboard (){
		$data['main_menu'] = 'mnu_dashboard';
		$data['sub_menu'] = '';
		$data['breadcrumb'] = [['dashboard', 'Dashboard']];
        return view('dashboard.dashboard')->withData($data);
    }
}
