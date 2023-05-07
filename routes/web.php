<?php

use Illuminate\Support\Facades\Route;

Route::get('/','AnasayfaController@index')->name('anasayfa');


Route::group(['middleware' => 'auth'], function () {


  

    Route::namespace('Backend\Yonetici')->name('yonetici.')->middleware('can:yonetici')->group(function(){

        Route::get('/dashboard','DashboardController@index')->name('dashboard');

        // Profil Ayarları Menüsü
        Route::group(['prefix' => 'yonetici/profil'], function () {
            Route::get('/','ProfilController@index')->name('ayar.profil');
            Route::post('/','ProfilController@sifre')->name('profil.sifre');
            Route::post('/ogrenci-sifre/{id}','OgrenciController@sifre')->name('ogrenci.sifre');
            Route::post('/ogretmen-sifre/{id}','OgrenciController@ogretmen_sifre')->name('ogretmen.sifre');
            Route::post('/yonetici-kaydet','ProfilController@yonetici_kaydet')->name('kullanici.guncelle');  
        });



        // Dersler & Kazanımlar Menüsü
        Route::group(['prefix' => 'yonetici/urunler'], function () {
            Route::match(['GET','POST'],'/','UrunController@index')->name('urunler');
            Route::get('/yeni','UrunController@form')->name('urun.yeni');
            Route::get('/duzenle/{id}','UrunController@form')->name('urun.duzenle');
            Route::post('/kaydet/{id?}','UrunController@kaydet')->name('urun.kaydet');
            Route::get('/sil/{id}','UrunController@sil')->name('urun.sil');
        }); 


        // Dersler & Kazanımlar Menüsü
        Route::group(['prefix' => 'yonetici/siparisler'], function () {
            Route::match(['GET','POST'],'/','SiparisController@index')->name('siparisler');
            Route::get('/yeni','SiparisController@form')->name('siparis.yeni');
            Route::get('/duzenle/{id}','SiparisController@form')->name('siparis.duzenle');
            Route::post('/kaydet/{id?}','SiparisController@kaydet')->name('siparis.kaydet');
            Route::get('/sil/{id}','SiparisController@sil')->name('siparis.sil');
        });

       

        // Dersler & Kazanımlar Menüsü
        Route::group(['prefix' => 'yonetici/firmalar'], function () {
            Route::match(['GET','POST'],'/','FirmaController@index')->name('firmalar');
            Route::get('/yeni','FirmaController@form')->name('firma.yeni');
            Route::get('/duzenle/{id}','FirmaController@form')->name('firma.duzenle');
            Route::post('/kaydet/{id?}','FirmaController@kaydet')->name('firma.kaydet');
            Route::get('/sil/{id}','FirmaController@sil')->name('firma.sil');
        });

         // Dersler & Kazanımlar Menüsü
         Route::group(['prefix' => 'yonetici/uyeler'], function () {
            Route::match(['GET','POST'],'/','UyeController@index')->name('uyeler');
            Route::get('/yeni','UyeController@form')->name('uye.yeni');
            Route::get('/duzenle/{id}','UyeController@form')->name('uye.duzenle');
            Route::post('/kaydet/{id?}','UyeController@kaydet')->name('uye.kaydet');
            Route::get('/sil/{id}','UyeController@sil')->name('uye.sil');
            Route::post('/sifre-guncelle','UyeController@sifre')->name('uye.sifre');
        });

        // Profil Ayarları Menüsü
        Route::group(['prefix' => 'yonetici/profil'], function () {
            Route::get('/','ProfilController@index')->name('ayar.profil');
            Route::post('/','ProfilController@sifre')->name('profil.sifre');
            Route::post('/kullanici-kaydet','ProfilController@yonetici_kaydet')->name('kullanici.guncelle');  
        });
    

    });

   

     Route::namespace('Backend\Kullanici')->name('kullanici.')->middleware('can:kullanici')->group(function(){

        // Profil Ayarları Menüsü
        Route::group(['prefix' => 'kullanici/profil'], function () {
            Route::get('/','ProfilController@index')->name('ayar.profil');
            Route::post('/','ProfilController@sifre')->name('profil.sifre');
            Route::post('/ogrenci-sifre/{id}','OgrenciController@sifre')->name('ogrenci.sifre');
            Route::post('/ogretmen-sifre/{id}','OgrenciController@ogretmen_sifre')->name('ogretmen.sifre');
            Route::post('/yonetici-kaydet','ProfilController@yonetici_kaydet')->name('kullanici.guncelle');  
        });

        
         // Dersler & Kazanımlar Menüsü
         Route::group(['prefix' => 'kullanici/siparislerim'], function () {
            Route::match(['GET','POST'],'/','SiparisController@index')->name('siparislerim');
            Route::get('/yeni','SiparisController@form')->name('siparis.yeni');
            Route::get('/duzenle/{id}','SiparisController@form')->name('siparis.duzenle');
            Route::post('/kaydet/{id?}','SiparisController@kaydet')->name('siparis.kaydet');
            Route::get('/sil/{id}','SiparisController@sil')->name('siparis.sil');
        });



        // Dersler & Kazanımlar Menüsü
        Route::group(['prefix' => 'kullanici/urunler'], function () {
            Route::match(['GET','POST'],'/','UrunController@index')->name('urunler');
            Route::get('/yeni','UrunController@form')->name('urun.yeni');
            Route::get('/duzenle/{id}','UrunController@form')->name('urun.duzenle');
            Route::post('/kaydet/{id?}','UrunController@kaydet')->name('urun.kaydet');
            Route::get('/sil/{id}','UrunController@sil')->name('urun.sil');
        });

         // Dersler & Kazanımlar Menüsü
         Route::group(['prefix' => 'kullanici/kategoriler'], function () {
            Route::match(['GET','POST'],'/','KategoriController@index')->name('kategoriler');
            Route::get('/yeni','KategoriController@form')->name('kategori.yeni');
            Route::get('/duzenle/{id}','KategoriController@form')->name('kategori.duzenle');
            Route::post('/kaydet/{id?}','KategoriController@kaydet')->name('kategori.kaydet');
            Route::get('/sil/{id}','KategoriController@sil')->name('kategori.sil');
        });

        // Dersler & Kazanımlar Menüsü
        Route::group(['prefix' => 'kullanici/siparisler'], function () {
            Route::match(['GET','POST'],'/','SiparisController@index')->name('siparisler');
            Route::get('/yeni','SiparisController@form')->name('siparis.yeni');
            Route::get('/duzenle/{id}','SiparisController@form')->name('siparis.duzenle');
            Route::post('/kaydet/{id?}','SiparisController@kaydet')->name('siparis.kaydet');
            Route::get('/sil/{id}','SiparisController@sil')->name('siparis.sil');
        });

       

        // Dersler & Kazanımlar Menüsü
        Route::group(['prefix' => 'kullanici/firmalar'], function () {
            Route::match(['GET','POST'],'/','FirmaController@index')->name('firmalar');
            Route::get('/yeni','FirmaController@form')->name('firma.yeni');
            Route::get('/duzenle/{id}','FirmaController@form')->name('firma.duzenle');
            Route::post('/kaydet/{id?}','FirmaController@kaydet')->name('firma.kaydet');
            Route::get('/sil/{id}','FirmaController@sil')->name('firma.sil');
        });

         // Dersler & Kazanımlar Menüsü
         Route::group(['prefix' => 'kullanici/uyeler'], function () {
            Route::match(['GET','POST'],'/','UyeController@index')->name('uyeler');
            Route::get('/yeni','UyeController@form')->name('uye.yeni');
            Route::get('/duzenle/{id}','UyeController@form')->name('uye.duzenle');
            Route::post('/kaydet/{id?}','UyeController@kaydet')->name('uye.kaydet');
            Route::get('/sil/{id}','UyeController@sil')->name('uye.sil');
            Route::post('/sifre-guncelle','UyeController@sifre')->name('uye.sifre');
        });

        // Profil Ayarları Menüsü
        Route::group(['prefix' => 'kullanici/profil'], function () {
            Route::get('/','ProfilController@index')->name('ayar.profil');
            Route::post('/','ProfilController@sifre')->name('profil.sifre');
            Route::post('/kullanici-kaydet','ProfilController@yonetici_kaydet')->name('kullanici.guncelle');  
        });
    

    });
   
});
    
// Yönetim Middleware Giriş
Route::group(['prefix' => 'yonetim'], function () {
    Route::post('/giris','LoginController@giris');
    Route::get('/giris','LoginController@giris_form')->name('giris');
    Route::post('/kayit','LoginController@kayit');
    Route::get('/kayit','LoginController@kayit_form')->name('kayit');
    Route::post('/cikis','LoginController@cikis')->name('cikis');
    Route::get('/aktiflestir/{aktivasyon}','LoginController@aktiflesir')->name('aktiflestir');
});


    Route::get('/cart-list', 'AnasayfaController@productList')->name('product.list');
    Route::get('/cart', 'AnasayfaController@cartList')->name('cart.list');
    Route::post('/cart', 'AnasayfaController@addToCart')->name('cart.store');
    Route::post('update-cart','AnasayfaController@updateCart')->name('cart.update');
    Route::post('remove','AnasayfaController@removeCart')->name('cart.remove');
    Route::post('clear','AnasayfaController@clearAllCart')->name('cart.clear');
    Route::post('save','AnasayfaController@sepetKaydet')->name('cart.save');


Route::get('/callback','AnasayfaController@callback')->name('callback');

 
