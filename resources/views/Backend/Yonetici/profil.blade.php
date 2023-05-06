@extends('Backend.layouts.master')
@section('title',"Kullanıcı Ayarları")
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kullanıcı Ayarları | <button type="button" data-toggle="modal" data-target="#sifreModal" class="btn btn-primary btn-sm"><i class="fa fa-unlock-alt"></i> Şifre Güncelle</button>
             
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('anasayfa') }}"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li>Ayarlar</li>
        <li class="active">Kullanıcı Ayarları</li>
      </ol>
    </section>

    <section class="content">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session()->has('mesaj'))
        <div class="alert alert-{{ session('mesaj_tur') }}">
            {{ session('mesaj') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
         <div class="box box-info">
             <div class="box-header with-border">
               <h3 class="box-title">Kullanıcı Bilgileri</h3>
             </div>
             <!-- /.box-header -->
             <!-- form start -->
             <form class="form-horizontal">
               <div class="box-body">
               
                 <div class="form-group">
                     <label for="inputPassword3" class="col-sm-2 control-label">Ad Soyad : </label>
   
                     <div class="col-sm-10">
                        <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">{{ auth()->user()->adsoyad }}</label>
                     </div>
                   </div>

                 
    

                   <div class="form-group">
                     <label for="inputPassword3" class="col-sm-2 control-label">Cep Telefonu :</label>
   
                     <div class="col-sm-10">
                        <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">{{ auth()->user()->telefon }}</label>
                     </div>
                   </div>

                  

                

                  
                
               </div>
              
             </form>
           </div>
        </div>
    </div>

    </section>
    <!-- /.content -->
  </div>

  <form action="{{ route('yonetici.profil.sifre') }}" method="POST">
  @csrf
<div class="modal fade" id="sifreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
            <div class="box-header with-border">
                <h3 class="box-title">Şifre Güncelle</h3>
            </div>
       <div class="row">
         <div class="col-md-12">
           <label >Eski Şifre</label>
           <input type="password" name="eskiSifre" class="form-control" required>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <label >Yeni Şifre</label>
           <input type="password" name="yeniSifre" class="form-control" required>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12">
           <label >Yeni Şifre Tekrar</label>
           <input type="password" name="yeniSifre_confirmation" class="form-control" required>
         </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Kapat</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Güncelle</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Modal -->
@endsection
@section('footer')
<script>
  setTimeout(function(){
    $('.alert').slideUp('slow');}
    ,3000);
</script>
@endsection
