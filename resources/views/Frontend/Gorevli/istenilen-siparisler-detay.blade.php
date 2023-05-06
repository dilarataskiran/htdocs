@extends('Frontend.layouts.master')
@section('title',"Alışveriş  Bilgileri")
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
    <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Alışveriş Bilgileri
        </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('anasayfa') }}"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li class="active">Alışveriş Bilgileri</li>
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
         
    <form action="{{ route('gorevli.alisveris.kaydet', $sepet->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box box-default">
          <div class="box-body">
            <div class="row">
             
              <div class="col-md-6">
              <div class="form-group">
                <label>Sepet Durumu</label>
                <select name="durum" class="form-control select2">
                    <option value="0" {{ $sepet->durum==0 ? 'selected' : '' }}>Beklemede</option>
                    <option value="1" {{ $sepet->durum==1 ? 'selected' : '' }}>Onaylandı</option>
                </select>
              </div>
              </div>

             

              <div class="col-md-3">
                <div class="form-group">
                  <label>Fiyat</label>
                  <input type="text" class="form-control" required name="fiyat"  value="{{ old('toplam',$sepet->toplam) }}" placeholder="Toplam">
                </div>
                </div>    
                
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Sipariş Tarihi</label>
                      <input type="text" class="form-control" required name="olusturma_tarihi" readonly  value="{{ old('olusturma_tarihi',$sepet->olusturma_tarihi) }}" placeholder="Toplam">
                    </div>
                    </div> 
            </div> 
        </div>


      </div>
    </form>

    <h3>Sepet Bilgileri</h3>

    <form action="{{ route('gorevli.alisveris.kaydet', $sepet->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box box-default">
          <div class="box-body">
            @foreach ($aldiklarim as $key => $aldik)
            <div class="row">
                <div class="col-md-3 col-xs-3 col-lg-3">
                  <div class="form-group">
                    @php  echo $key==0 ?  "<label>Ürün</label>" : "" @endphp
                    <input type="text" class="form-control" readonly name="sepet_id" value="{{ old('sepet_id',$aldik->urun->urun_adi) }}" placeholder="Sepet ID">
                  </div>
                  </div>
            
  
                <div class="col-md-3 col-xs-3 col-lg-3">
                    <div class="form-group">
                        @php  echo $key==0 ?  "<label>Adet</label>" : "" @endphp
                      <input type="number" class="form-control" readonly required name="adet"  value="{{ old('adet',$aldik->adet) }}" placeholder="Toplam">
                    </div>
                    </div>  
               
  
                <div class="col-md-3 col-xs-3 col-lg-3">
                  <div class="form-group">
                    @php  echo $key==0 ?  "<label>Fiyat</label>" : "" @endphp
                    <input type="text" readonly class="form-control" required name="tutar"  value="{{ old('tutar',$aldik->tutar) }}" placeholder="Tutar">
                  </div>
                  </div>  
                  
                   <div class="col-md-3 col-xs-3 col-lg-3">
                    <div class="form-group">
                      @php  echo $key==0 ?  "<label>Tutar</label>" : "" @endphp
                      <input type="text" readonly class="form-control" required name="toplam_tutar"  value="{{ number_format(($aldik->tutar*$aldik->adet),2) }}" placeholder="Tutar">
                    </div>
                    </div>    
                  
              </div> 
            @endforeach
        </div>

          <!--<div class="box-footer">
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> {{ $sepet->id > 0 ? "Güncelle" : "Kaydet" }}</button>
          </div>-->
      </div>
    </form>


</div>
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

