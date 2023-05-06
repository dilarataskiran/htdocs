<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
     // Giriş Yap POST
     public function giris()
     {
      

         if (Auth::attempt(['email' => request('email'), 'password' => request('password'),'aktif_mi' => 1]))
         {
             return redirect()->intended('/');   
         }
         elseif(Auth::attempt(['email' => request('email'), 'password' => request('password'), 'aktif_mi' => 0]))
         {
            $errors = ['aktif_mi' => 'Üyeliğiniz Aktif Değil!'];
            return redirect()->back()->withErrors($errors);
         }
         else
         {
             $errors = ['hata' => 'Kullanıcı Adı veya Şifre Yanlış'];
             return redirect()->back()->withErrors($errors);
         }
 
         return redirect()->route('giris');
     }
 
     // Giriş Formu
     public function giris_form()
     {
         return view('yonetim.giris-yap');
     }

     public function kayit_form()
     {
         return view('yonetim.kayit-ol');
     }
 
     public function kayit()
     {
        $this->validate(request(),[
             'adsoyad' => 'required|min:5',
             'email' => 'required|email|unique:users',
             'password' => 'required|confirmed'
        ]);

       
 

        $yonetici = User::create([
             'adsoyad' => request('adsoyad'),
             'email' => request('email'),
             'password' => Hash::make(request('password')),
             'aktif_mi' => 1,
             'user_type' => 2
        ]);

        //

        // UNIQUE ID ÜRET ONU KULLANICIYA VER 

        //


        $yonetici->roles()->sync(2);

 
        // Mail::to(request('email'))->send(new KayitMail($yonetici));
 
        auth()->login($yonetici);
 
        $errors = ['hata' => 'Giriş Yapabilirsiniz!'];
        return redirect()->route('giris')->withErrors($errors);
     }
 
     public function cikis()
     {
         Auth::logout();
         request()->session()->flush();
         request()->session()->regenerate();
 
         return redirect()->route('giris');
     }
}
