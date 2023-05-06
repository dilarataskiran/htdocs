<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Teachers\MevduatController;
use App\Models\DepozitModel;
use App\Models\FonModel;
use App\Models\MevduatModel;
use App\Models\PesinModel;
use App\Models\TaksitModel;
use App\Models\UrunModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SepetModel;
use App\Models\SepetUrunModel;
use Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AnasayfaController extends Controller
{
    public function index()
    {
        $session_array = session('_token');
        $urunler = UrunModel::get();


        $session_array = session('_token');
        $cartItems = \Cart::session($session_array)->getContent();

        return view('anasayfa',compact('urunler','cartItems'));
    
    }

    public function cartList()
    {
       
        $session_array = session('_token');
        $cartItems = \Cart::session($session_array)->getContent();
        //foreach ($cartItems as $key => $value) {
        // return dd($value)$value;
        // }
        return view('Frontend.cart', compact('cartItems'))->with('mesaj','Ürün Eklendi.')->with('mesaj_tur','success');
    }


    public function addToCart(Request $request)
    {
        $session_array = session('_token');
        \Cart::session($session_array)->add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,        
        ]);
        
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('anasayfa')->with('mesaj_tur','success')->with('mesaj','Ürün Başarıyla Eklendi.');
    }

    public function updateCart(Request $request)
    {
        $session_array = session('_token');
        \Cart::session($session_array)->update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        $session_array = session('_token');
        \Cart::session($session_array)->remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        $session_array = session('_token');
        \Cart::session($session_array)->clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    public function sepetKaydet()
    {
        $session_array = session('_token');
        $userId = auth()->user()->id; // or any string represents user identifier
        $cartItems = \Cart::session($session_array)->getContent();



        $urunSepet = SepetModel::create([
            'kullanici_id' => $userId,
            'sepet_id' => $session_array,
            'toplam' => \Cart::getTotal(),
            'durum' => 0,
            'odeme_tipi' => "Havale"
        ]);

        foreach($cartItems as $item)
        {       
           $sepetOnay = SepetUrunModel::create([
            'sepet_id' => $session_array,
            'urun_id' => $item->id, // the Id of the item
            'adet' => $item->quantity, // the name
            'tutar' => $item->price,
            'durum' => 1
           ]);
        }

        \Cart::clear();
        return redirect()->route('cart.list')->with('mesaj_tur','success')->with('mesaj','Sipariş Oluşturuldu!');

    }

    
}
