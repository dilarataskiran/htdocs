<?php

namespace App\Http\Controllers\Backend\Kullanici;

use App\Http\Controllers\Controller;
use App\Models\SepetModel;
use App\Models\SepetUrunModel;
use App\Models\SiparisModel;
use Illuminate\Http\Request;

class SiparisController extends Controller
{
    // Kullanıcı Siparişlerini Görüntülediği Sayfa
    public function index()
    {
        $session_array = session('_token');
        $cartItems = \Cart::session($session_array)->getContent();

        $siparislerim = SepetModel::where('kullanici_id',auth()->user()->id)->get();
        return view('Frontend.Kullanici.siparislerim',compact('siparislerim','cartItems'));
    }

    // Sipariş Detay
    public function form($id=0)
    {
        $session_array = session('_token');
        $cartItems = \Cart::session($session_array)->getContent();

        if ($id > 0)
        {
            $sepet = SepetModel::where('sepet_id',$id)->firstOrFail();
            $aldiklarim = SepetUrunModel::where('sepet_id',$id)->get();
            return view('Frontend.Kullanici.siparis-detay',compact('sepet','aldiklarim','cartItems'));
        }
        else 
        {
            $sepet = new SepetModel();
            return redirect()->back()->with('mesaj_tur','warning')->with('mesaj','Kayıt İşlemi İçin Geçersiz İşlem...');
        }
    }

    public function kaydet($id=0)
    {
        if ($id > 0)
        {
            
        }
        else
        {
            
        }
    }
}
