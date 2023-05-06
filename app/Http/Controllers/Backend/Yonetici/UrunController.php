<?php

namespace App\Http\Controllers\Backend\Yonetici;

use App\Http\Controllers\Controller;
use App\Models\UrunModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UrunController extends Controller
{
    public function index()
    {
        $urunler = UrunModel::get();
        return view('Backend.Yonetici.urunler',compact('urunler'));
    }

    public function form($id = 0)
    {
        if ($id > 0) 
        {
            
            $urun = UrunModel::where('id',$id)->firstOrFail();
            return view('Backend.Yonetici.urun-detay',compact('urun'));
        }
        else
        {
            $urun = new UrunModel();
            return view('Backend.Yonetici.urun-detay',compact('urun'));
        }
    }

    public function kaydet($id=0)
    {
        if ($id > 0)
        {
            $urun = UrunModel::where('id',$id)->firstOrFail();
            $urun->update([
                'slug' => Str::slug(request('urun_adi')),
                'kategori' => request('kategori'),
                'urun_adi' => request('urun_adi'),
                'aciklama' => request('aciklama'),
                'fiyat' => request('fiyat'),
                'aktif_mi' => request('aktif_mi')
            ]);

            if (request()->hasFile('gorsel_path'))
            {
                $this->validate(request(),[
                    'gorsel_path' => 'image|mimes:jpeg,bmp,png|max:2048'
                ]);
    
               if ($urun->gorsel_path == null)
               {
                $urun_foto = request()->file('gorsel_path');
    
                $dosyaadi = $urun->slug . "-" . time() . "." .  $urun_foto->extension();
    
                if($urun_foto->isValid())
                {
                    $urun_foto->move('urun_resimleri/',$dosyaadi);
    
                   $urun->update([
                    'gorsel_path' =>$dosyaadi
                   ]);
                }
               }
               else
               {
                   $urunGorsel = $urun->gorsel_path;
                   File::delete('urun_resimleri/'.$urunGorsel);

                   $urun_foto = request()->file('gorsel_path');
    
                   $dosyaadi = $urun->slug . "-" . time() . "." .  $urun_foto->extension();
    
                   if($urun_foto->isValid())
                    {
                        $urun_foto->move('urun_resimleri/',$dosyaadi);
                        $urun->update([
                            'gorsel_path' =>$dosyaadi
                        ]);
                    }

               }
            }

            return redirect()->route('yonetici.urun.duzenle',$id)->with('mesaj_tur','success')->with('mesaj',"Güncelleme İşlemi Başarılı");
        }
        else
        {
            $urun = UrunModel::create([
                'slug' => Str::slug(request('urun_adi')),
                'kategori' => request('kategori'),
                'urun_adi' => request('urun_adi'),
                'aciklama' => request('aciklama'),
                'fiyat' => request('fiyat'),
                'aktif_mi' => request('aktif_mi')
            ]);

            if (request()->hasFile('gorsel_path'))
            {
                $this->validate(request(),[
                    'gorsel_path' => 'image|mimes:jpeg,bmp,png|max:2048'
                ]);
    
                $blog_foto = request()->file('gorsel_path');
    
                $dosyaadi = $urun->slug . "-" . time() . "." .  $blog_foto->extension();
    
                if($blog_foto->isValid())
                {
                    $blog_foto->move('urun_resimleri/',$dosyaadi);
    
                   $urun->update([
                    'gorsel_path' =>$dosyaadi
                   ]);
                }                      
            }

            return redirect()->route('yonetici.urun.duzenle',$urun->id)->with('mesaj_tur','success')->with('mesaj',"Güncelleme İşlemi Başarılı");

        }
    }


    public function sil($id)
    {
        $urun = UrunModel::where('id',$id)->delete();

        return redirect()->route('yonetici.urunler')->with('mesaj_tur','success')->with('mesaj',"Silme İşlemi Başarılı");
    }
}
