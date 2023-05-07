@extends('Frontend.layouts.master')
@section('title', 'Anasayfa')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

    </style>
@endsection
@section('content')
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header text-center">
        <h3>
         Ürünler
        </h3>
        <br>
      
      </section>

      <!-- Main content -->
      <section class="content">
       
         <div class="row">

          @foreach($urunler as $urun)
          <div class="col-xs-6 col-md-3">
            <div class="box ">
              <div class="box-header  text-center">
                <p style="font-family:Impact, Haettenschweiler, 'Arial Narrow ', sans-serif; font-size:18px;" >{{ $urun->urun_adi }}</p> 
              </div>
              <div class="box-body text-center ">
                <div class="form-group text-center">
                  <img src="{{ asset('urun_resimleri/'.$urun->gorsel_path) }}" style="width: 100px !important; height: 100px !important;" style="align-content: center" class="rounded-circle img-thumbnail img-responsive" alt="">
                </div>
                <p><b>{{ $urun->fiyat }} TL</b></p>  
                
                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                 
                  <input type="hidden" value="{{ $urun->id }}" name="id">
                  <input type="hidden" value="{{ $urun->urun_adi }}" name="name">
                  <input type="hidden" value="{{ $urun->fiyat }}" name="price">
                  <input type="hidden" value="1" name="quantity">
                  <button class="btn btn-success btn-block ">Sepete Ekle</button>    
                </form>
              </div>
            </div>
          </div>
          @endforeach
         
        </div>
      </section><!-- /.content -->
    </div><!-- /.container -->
  </div><!-- /.content-wrapper -->
  @endsection