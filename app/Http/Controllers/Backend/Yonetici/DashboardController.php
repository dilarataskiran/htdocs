<?php

namespace App\Http\Controllers\Backend\Yonetici;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function index()
    {
        return view('Backend.anasayfa');
    }

  
}
