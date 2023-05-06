<?php

namespace App\Http\Controllers\Backend\Yonetici;

use App\Http\Controllers\Controller;
use App\Models\SepetModel;
use App\Models\SepetUrunModel;
use Illuminate\Http\Request;

class SiparisController extends Controller
{
    public function index()
    {
        $alisverisler = SepetModel::get();
        return view('Backend.Yonetici.siparisler',compact('alisverisler'));
    }

    public function form($id=0)
    {
        if ($id > 0)
        {
            $sepet = SepetModel::where('id',$id)->firstOrFail();
            $aldiklarim = SepetUrunModel::where('sepet_id',$sepet->sepet_id)->get();
            return view('Backend.Yonetici.siparis-detay',compact('sepet','aldiklarim'));
        }
        else
        {
            
        }
    }

    public function kaydet($id=0)
    {
        if ($id > 0)
        {
            $sepet = SepetModel::where('id',$id)->firstOrFail();
            $sepet->update([
                'durum' => request('durum')
            ]);

            return redirect()->route('yonetici.siparis.duzenle',$sepet->id)->with('mesaj_tur','success')->with('mesaj','Güncelleme İşlemi Başarılı');
        }
        
    }

    public function sil($id)
    {
        $sepet = SepetModel::where('id',$id)->firstOrFail();
        $sepetDurum = $sepet->durum;

        if ($sepetDurum == 0)
        {
            $sepet = SepetModel::where('id',$id)->firstOrFail();
            $aldiklarim = SepetUrunModel::where('sepet_id',$sepet->sepet_id)->get();

            foreach ($aldiklarim as $aldik) 
            {
                $aldik->delete();
            }

            $sepet->delete();

            return redirect()->route('yonetici.siparisler')->with('mesaj_tur','success')->with('mesaj','Silme İşlemi Başarılı');
        }
        else
        {
            return redirect()->route('yonetici.siparisler')->with('mesaj_tur','warning')->with('mesaj','Bu Siparişi Silemezsiniz! Ofisle İletişime Geçin.');
        }
    }
}
