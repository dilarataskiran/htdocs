<?php

namespace App\Http\Controllers\Backend\Daire;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{

    // Kullanıcının Profil Sayfası
    public function index()
    {
        $session_array = session('_token');
        $cartItems = \Cart::session($session_array)->getContent();

        return view('Backend.Daire.profil',compact('cartItems'));
    }


    // Kullanıcı Bilgilerini Kaydetme
    public function yonetici_kaydet()
    {
        $kullanici = User::where('id',request('id'))->firstOrFail();
        $kullanici->update([
            'adsoyad' => request('adsoyad'),
            'il' => request('il'),
            'ilce' => request('ilce'),
            'mahalle' => request('mahalle'),
            'sokak' => request('sokak'),
            'apartman_no' => request('apartman_no'),
            'kapi_no' => request('kapi_no')
        ]);

        return redirect()->route('kullanici.ayar.profil')->with('mesaj_tur','success')->with('mesaj','Güncelleme İşlemi Başarılı');

    }

    // Kullanıcı Şifre Güncelleme
    public function sifre() // Tamamlandı
    {
        $this->validate(request(),[
            'yeniSifre' => 'required|confirmed'
        ]);

        $user = User::where('id',auth()->user()->id)->first();

        if (Hash::check(request('eskiSifre'), $user->password))
        {
            $user->update([
                'password' => Hash::make(request('yeniSifre')),
           ]);

            return redirect()->route('kullanici.ayar.profil',auth()->user()->id)
            ->with('mesaj_tur','success')
            ->with('mesaj','Şifreniz Başarıyla Güncellendi!');

        }
        else
        {
            return redirect()->route('kullanici.ayar.profil',auth()->user()->id)
            ->with('mesaj_tur','danger')
            ->with('mesaj','Mevcut Şifrenizi Lütfen Doğru Girin!');
        }
    }
}
