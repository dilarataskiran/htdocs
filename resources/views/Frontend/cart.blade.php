@extends('Frontend.layouts.master')
@section('title',"Ürün Yönetimi")
@section('content')
@section('head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
@endsection
 <div class="content-wrapper">
    <div class="container">
    <section class="content-header">
      @if ($message = Session::get('success'))
      <div class="alert alert-info">
          <p class="text-green-800">{{ $message }}</p>
      </div>
      @endif
        </section>
    
        <section class="invoice">
        
        <div class="row">
        <div class="col-xs-12">
        <h2 class="page-header">
        <i class="fa fa-globe"></i> Sepet
        <small class="pull-right">Tarih : {{ date('d.m.Y',strtotime(now())) }}</small>
        </h2>
        </div>
        
        </div>
        
        
        
        <div class="row">
        <div class="col-xs-12 ">
        <table class="table table-hover table-responsive table-sm">
        <thead>
        <tr>
        <th>Ürün Adı</th>
        <th>Miktar</th>
        <th>Fiyat</th>
        </tr>
        </thead>
        <tbody>
       
        @foreach ($cartItems as $item)
        <tr>
         <td>{{ $item->name }}</td>
         <td class="justify-center mt-6 md:justify-end md:flex">
            <div class="h-10 w-28">
              <div class="relative flex flex-row w-full h-8">
                
                <form action="{{ route('cart.update') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $item->id}}" >
                <input type="number" style="width: 40px" name="quantity" value="{{ $item->quantity }}" class="form-control-xs text-center" />
                <button type="submit" class="btn btn-success btn-xs px-2 pb-2 ml-2 text-white bg-blue-500">Güncelle</button>
                </form>
              </div>
            </div>
          </td>
          <td>  {{ number_format(($item->price * $item->quantity),2)}} TL</td>
          <td >
            <form action="{{ route('cart.remove') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $item->id }}" name="id">
                <button class="btn btn-xs btn-danger px-4 py-2 text-white bg-red-600">x</button>
            </form>
            
          </td>
        </tr>
        @endforeach
        
        </tbody>
        </table>
        </div>
        
        </div>
        
        <div class="row">
        
        

        <div class="col-xs-12">
        
        <div >
        <table class="table">
        <th>Sepet Tutarı</th>
        <td>   </td>
        <td></td>
       <td>{{ number_format(Cart::getTotal(),2) }} TL</td>
        </tr>
        </table>
        </div>
        </div>
       
        
        </div>
        
        
        <div class="row no-print">
        <div class="col-xs-12">
        @if(@auth()->user()->id)
        <div>
          
            <form action="{{ route('cart.save') }}" method="POST">
              @csrf
              <button class=" btn btn-success pull-right">Sepeti Kaydet</button>
            </form>
           
          </div>
        @else
       <a href="{{ route('giris') }}">
        <button class=" btn btn-danger pull-right">Üye Girişi Yapınız</button>
       </a>
        @endif
        <div>
            <form action="{{ route('cart.clear') }}" method="POST">
              @csrf
              <button class=" btn btn-warning ">Tüm Sepeti Boşalt</button>
            </form>
            
          </div>
        </div>
        </div>
        </section>
    </div>
 </div>
 @endsection
  @section('footer')
  <script src="{{ asset('bower_components\datatables.net\js\jquery-3.3.1.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\cihaz.dataTables.min.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\dataTables.button.min.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\buttons.flash.min.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\jszip.min.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\pdfmake.min.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\vfs_fonts.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\buttons.html5.min.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\buttons.print.min.js') }}"></script>
  @endsection