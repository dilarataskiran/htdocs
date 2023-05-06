<?php

namespace App\Http\Controllers\Backend\Yonetici;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('Backend.Yonetici.profil');
    }
}
