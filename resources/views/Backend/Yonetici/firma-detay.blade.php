@extends('layouts.master')
@section('title',"Firma Detay")
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
  

    <section class="content-header">
       @if($firma->id > 0)
       @if($taksit[0]->alinan > 0)
       <div class="row">
         <div class="col-lg-4 col-xs-6">
           <div class="small-box bg-primary">
             <div class="inner">
               <h3>{{ number_format($taksit[0]->alinan,2,',','.') }}</h3>
               <p>Taksit Toplam Alınan</p>
             </div>
             <div class="icon">
                 <i class="fa fa-try"></i>
             </div>
         <a href="" class="small-box-footer">Sayfaya Git <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-4 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-green">
             <div class="inner">
               <h3>{{ number_format($taksit[0]->odenen,2,',','.') }}</h3>
               <p>Taksit Ödenen Tutar</p>
             </div>
             <div class="icon">
                 <i class="fa fa-try"></i>
             </div>
             <a href="" class="small-box-footer">Sayfaya Git <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-4 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-{{$taksit[0]->fark >= 0 ? 'green' : 'red'}}">
             <div class="inner">
               <h3>{{ number_format($taksit[0]->fark,2,',','.') }}</h3>
               <p>Toplam Fark</p>
             </div>
             <div class="icon">
                 <i class="fa fa-try"></i>
             </div>
             <a href="" class="small-box-footer">Sayfaya Git <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
       </div>
       @endif
       @if($pesin[0]->alinan > 0)
       <div class="row">
         <div class="col-lg-4 col-xs-6">
           <div class="small-box bg-primary">
             <div class="inner">
               <h3>{{ number_format($pesin[0]->alinan,2,',','.') }}</h3>
               <p>Peşin Toplam Alınan</p>
             </div>
             <div class="icon">
                 <i class="fa fa-try"></i>
             </div>
         <a href="" class="small-box-footer">Sayfaya Git <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-4 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-green">
             <div class="inner">
               <h3>{{ number_format($pesin[0]->odenen,2,',','.') }}</h3>
               <p>Peşin Ödenen Tutar</p>
             </div>
             <div class="icon">
                 <i class="fa fa-try"></i>
             </div>
             <a href="" class="small-box-footer">Sayfaya Git <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-4 col-xs-6">
           <!-- small box -->
           <div class="small-box bg-{{$taksit[0]->fark >= 0 ? 'green' : 'red'}}">
             <div class="inner">
               <h3>{{ number_format($pesin[0]->fark,2,',','.') }}</h3>
               <p>Toplam Fark</p>
             </div>
             <div class="icon">
                 <i class="fa fa-try"></i>
             </div>
             <a href="" class="small-box-footer">Sayfaya Git <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
       </div>
       @endif
       @endif
        <h1>
            Firma Bilgileri 
          </h1>
     
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
         
    <form action="{{ route('managers.firma.kaydet', $firma->id)}}" method="POST">
        @csrf
        <div class="box box-default">
          <div class="box-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Firma Kodu</label>
                  <input type="text" class="form-control" name="firma_kodu" value="{{ old('firma_kodu',$firma->firma_kodu) }}" placeholder="Firma Kodu" required {{ $firma->id > 0 ? 'readonly' : '' }}>
                </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Firma Adı</label>
                    <input type="text" class="form-control" name="firma_adi" value="{{ old('firma_adi',$firma->firma_adi) }}" placeholder="Firma Adı" required>
                  </div>
                  </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Adres</label>
                  <input type="text" class="form-control" name="adres" value="{{ old('adres',$firma->adres) }}" placeholder="Adres">
                </div>
                </div>
              <div class="col-md-3">
              <div class="form-group">
                <label>Telefon No</label>
                <input type="text" class="form-control" name="telefon_no" value="{{ old('telefon_no',$firma->telefon_no) }}" placeholder="Telefon No">
              </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                     <label>Komisyon</label>
                     <input type="text"  class="form-control" name="komisyon" value="{{ old('komisyon',$firma->komisyon) }}">
                </div>
                </div>
              <div class="col-md-3" style="display:none;">
              <div class="form-group">
                   <label>Alacak</label>
                   <input type="text" readonly class="form-control" name="alacak" value="{{ old('alacak',$firma->alacak) }}">
              </div>
              </div>
              <div class="col-md-3" style="display:none;">
                <div class="form-group">
                     <label>Borç</label>
                     <input type="text" readonly class="form-control" name="borc" value="{{ old('borc',$firma->borc) }}">
                </div>
                </div>
                <div class="col-md-3" style="display:none;">
                    <div class="form-group">
                         <label>Bakiye</label>
                         <input type="text" readonly class="form-control" name="bakiye" value="{{ old('bakiye',$firma->bakiye) }}">
                    </div>
                    </div>
            
            </div> 
        </div>
          <div class="box-footer">
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> {{ $firma->id > 0 ? "Güncelle" : "Kaydet" }}</button>
          </div>
      </div>
    </form>
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

