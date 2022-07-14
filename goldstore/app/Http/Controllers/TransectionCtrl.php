<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lager;

class TransectionCtrl extends Controller
{
    public function transection (){
		$data['main_menu'] = 'mnu_transection';
		$data['sub_menu'] = '';
		$data['breadcrumb'] = [['transection', 'Transaction']];
		$data['lager'] = Lager::get()->where('is_active','A')->where('is_delete','N')->toArray();
        return view('transection.transection')->withData($data);
    }
}
