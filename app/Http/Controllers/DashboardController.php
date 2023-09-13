<?php

namespace App\Http\Controllers;

use App\Models\Nik;
use App\Models\Data;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $count = Nik::all()->count();
        
        return view('pages.dashboard.index', compact('count'));
    }

    
}
