<?php

namespace App\Http\Controllers\Backend\Yonetici;

use App\Http\Controllers\Controller;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoriler = KategoriModel::where('ust_kategori_id',null)->get();;
        return view('Backend.Yonetici.kategoriler',compact('kategoriler'));
    }

    public function form($id=0)
    {
        $kategoriler = KategoriModel::where('ust_kategori_id',null)->get();
      
        if ($id > 0)
        {
            $kategori = KategoriModel::where('id',$id)->firstOrFail();
            $altKategoriler = KategoriModel::where('ust_kategori_id',$id)->get();
            return view('Backend.Yonetici.kategori-detay',compact('kategoriler','kategori','altKategoriler'));
        }
        else
        {
            $kategori = new KategoriModel();
            $altKategoriler = new KategoriModel();
            return view('Backend.Yonetici.kategori-detay',compact('kategoriler','kategori','altKategoriler'));
        }
    }

    public function kaydet($id = 0)
    {
        if ($id > 0)
        {
            $kategori = KategoriModel::where('id',$id)->first();
            $kategori->update([
                'kategori_adi' => request('kategori_adi'),
                'durum' => request('durum')
            ]);

            return redirect()->route('yonetici.kategori.duzenle',$kategori->id)->with('mesaj_tur','success')->with('mesaj','Güncelleme İşlemi Başarılı');
        }
        else
        {
            $kategori = KategoriModel::create([
                'kategori_adi' => request('kategori_adi'),
                'durum' => request('durum')
            ]);

            return redirect()->route('yonetici.kategori.duzenle',$kategori->id)->with('mesaj_tur','success')->with('mesaj','Kayıt İşlemi Başarılı');
        }
    }

    public function sil($id)
    {
       $kategori = KategoriModel::where('id',$id)->firstOrFail();

       $altKategoriler = KategoriModel::Where('ust_kategori_id',$kategori->id)->get();

       foreach($altKategoriler as $altKategori)
       {
        $altKategori->delete();
       }

       $kategori->delete();

       return redirect()->route('yonetici.kategoriler')->with('mesaj_tur','success')->with('mesaj','Kayıt Silindi!');
    }

    public function alt_kategori_kaydet($id=0)
    {
        $kategoriID = request('ust_kategori_id');
        if ($id > 0)
        {
            $kategori = KategoriModel::where('id',$id)->first();
            $kategori->update([
                'kategori_adi' => request('kategori_adi'),
                'ust_kategori_id' => $kategoriID,
                'durum' => 1
            ]);

            return redirect()->back();
        }
        else
        {
            $kategori = KategoriModel::create([
                'kategori_adi' => request('kategori_adi'),
                'ust_kategori_id' => $kategoriID,
                'durum' => 1
            ]);

            return redirect()->back();
        }
    }

    public function alt_kategori_sil($id)
    {
       $kategori = KategoriModel::where('id',$id)->firstOrFail();
       $kategoriUstID = $kategori->ust_kategori_id;
       $kategori->delete();

       return redirect()->route('yonetici.kategori.duzenle',$kategoriUstID)->with('mesaj_tur','success')->with('mesaj','Kayıt Silindi!');
    }
}
