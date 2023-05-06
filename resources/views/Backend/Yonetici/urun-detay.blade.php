@extends('Backend.layouts.master')
@section('title',"Ürün Bilgileri")
@section('head')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ürün Bilgileri
        </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('anasayfa') }}"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li><a href="{{ route('yonetici.urunler') }}"> Ürün Yönetimi</a></li>
        <li class="active">Ürün Ekle</li>
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
        @if(session()->has('mesaj_tur'))
        <div class="alert alert-{{ session('mesaj_tur') }}">
          {{ session('mesaj') }}
        </div>
        @endif
         
    <form action="{{ route('yonetici.urun.kaydet', $urun->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box box-default">
          <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Ürün Adı</label>
                  <input type="text" class="form-control" required name="urun_adi" value="{{ old('urun_adi',$urun->urun_adi) }}" placeholder="Ürün Adı">
                </div>
                </div>
              <div class="col-md-4">
              <div class="form-group">
                <label>Ürün Durumu</label>
                <select name="aktif_mi" class="form-control select2">
                    <option value="0" {{ $urun->aktif_mi==0 ? 'selected' : '' }}>Pasif</option>
                    <option value="1" {{ $urun->aktif_mi==1 ? 'selected' : '' }}>Aktif</option>
                </select>
              </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Ürün Kategorisi</label>
                 <select name="kategori" class="form-control select2">
                     <option value="Süs" {{ $urun->kategori=="Süs" ? 'selected' : '' }}>Süs</option>
                     <option value="Temizlik" {{ $urun->kategori=="Temizlik" ? 'selected' : '' }}>Temizlik</option>
                 </select>
                </div>
                </div>
              

              <div class="col-md-4">
                <div class="form-group">
                  <label>Ürün Görsel</label>
                  <input type="file" class="form-control"  name="gorsel_path"  value="{{ old('gorsel_path',$urun->gorsel_path) }}" placeholder="Ürün Görseli">
                </div>
                </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Fiyat</label>
                  <input type="text" class="form-control" required name="fiyat"  value="{{ old('fiyat',$urun->fiyat) }}" placeholder="Fiyat">
                </div>
                </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Açıklama</label>
                  <input type="text" class="form-control" required name="aciklama" multiple value="{{ old('aciklama',$urun->aciklama) }}" placeholder="Açıklama">
                </div>
                </div>
             
             
             
            </div> 
            @if($urun->gorsel_path != null)
            <div class="row">
              <div class="col-md-12">
              <div class="form-group">
              <img src="{{ asset('urun_resimleri/'.$urun->gorsel_path) }}" alt="" class="img" width="250" height="200">
              </div>
            </div>
            </div>
            @endif
        </div>

          <div class="box-footer">
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> {{ $urun->id > 0 ? "Güncelle" : "Kaydet" }}</button>
          </div>
      </div>
    </form>


    
      <!-- Modal -->
      </section>
  </div>
  @endsection
@section('footer')
<!-- Select2 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script src="{{ asset('bower_components\datatables.net\js\jquery-3.3.1.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\cihaz.dataTables.min.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\dataTables.button.min.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\buttons.flash.min.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\jszip.min.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\pdfmake.min.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\vfs_fonts.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\buttons.html5.min.js') }}"></script>
  <script src="{{ asset('bower_components\datatables.net\js\buttons.print.min.js') }}"></script>
<!-- Page script -->
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
        $('[data-mask]').inputmask()
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })

    })
</script>
<script>
    setTimeout(function(){
      $('.alert').slideUp('slow');}
      ,3000);
  </script>
  <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            /*'colvis',*/'csv', 'excel', 'pdf', 'print'
        ],
    } );
  } );  
  </script>
@endsection

