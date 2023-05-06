<?php

namespace App\Http\Controllers\Backend\Yonetici;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UyeController extends Controller
{
    public function index()
    {
        $uyeler = User::where('user_type','!=','1')->get();
        return view('Backend.Yonetici.uyeler',compact('uyeler'));
    }
    
    public function form($id=0)
    {

        $gorevliler = User::where('user_type',3)->get();

        if ($id > 0)
        {
            $uye = User::where('id',$id)->firstOrFail();
            return view('Backend.Yonetici.uye-detay',compact('uye','gorevliler'));
        }
        else
        {
            $uye = new User();
            return view('Backend.Yonetici.uye-detay',compact('uye','gorevliler'));
        }
    }

    public function kaydet($id=0)
    {
        if ($id > 0)
        {
          
            $uye = User::where('id',$id)->firstOrFail();
            $uye->update([
               'adsoyad' => request('adsoyad'),
               'user_type' => 2,
               'aktif_mi' => request('aktif_mi'),
               'il' => request('il'),
               'ilce' => request('ilce'),
               'mahalle' => request('mahalle'),
               'sokak' => request('apartman_no'),
               'kapi_no' => request('kapi_no'),
               'telefon' => request('telefon'),
            ]);


            $uye->roles()->sync(2);
            

            return redirect()->route('yonetici.uyeler')->with('mesaj_tur','success')->with('mesaj','Güncelleme İşlem Başarılı');
        }
        else
        {
            $uye = User::create([
                'adsoyad' => request('adsoyad'),
                'user_type' => 2,
                'aktif_mi' => request('aktif_mi'),
                'il' => request('il'),
                'ilce' => request('ilce'),
                'mahalle' => request('mahalle'),
                'sokak' => request('apartman_no'),
                'kapi_no' => request('kapi_no'),
                'telefon' => request('telefon'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
            ]);

            $uye->roles()->sync(2);

    

            return redirect()->route('yonetici.uyeler')->with('mesaj_tur','success')->with('mesaj','Kayıt İşlem Başarılı');
        }
    }

    public function sifre() // Tamamlandı
    {
        $this->validate(request(),[
            'yeniSifre' => 'required|confirmed'
        ]);

        $user = User::where('id',request('uye_id'))->first();

        $user->update([
            'password' => Hash::make(request('yeniSifre')),
       ]);

        return redirect()->route('yonetici.uye.duzenle',request('uye_id'))
        ->with('mesaj_tur','success')
        ->with('mesaj','Şifreniz Başarıyla Güncellendi!');
    }
    
    public function sil($id)
    {
        $uye = User::where('id',$id)->firstOrFail();
        $uye->delete();

        return redirect()->route('yonetici.uyeler')->with('mesaj_tur','success')->with('mesaj','Silme İşlem Başarılı');
    }
}
