@extends('Backend.layouts.master')
@section('title',"Kullanıcı Bilgileri")
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
            Kullanıcı Bilgileri |  <button type="button" data-toggle="modal" data-target="#sifreModal" class="btn btn-primary" ><i class="fa fa-unlock-alt"></i> Şifre Güncelle</button>
          </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('anasayfa') }}"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li><a href="{{ route('yonetici.uyeler') }}"> Kullanıcılar</a></li>
        <li class="active">Kullanıcı Detay</li>
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
         
    <form action="{{ route('yonetici.uye.kaydet', $uye->id)}}" method="POST">
        @csrf
        <div class="box box-default">
          <div class="box-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Kullanıcı Adı Soyadı</label>
                  <input type="text" class="form-control" required name="adsoyad" value="{{ old('adsoyad',$uye->adsoyad) }}" placeholder="Ad Soyad">
                </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" required name="email" value="{{ old('email',$uye->email) }}" placeholder="Email">
                  </div>
                  </div>
             
              <div class="col-md-2">
              <div class="form-group">
                <label>Üyelik Durumu</label>
                <select name="aktif_mi" class="form-control select2">
                    <option value="0" {{ $uye->aktif_mi==0 ? 'selected' : '' }}>Pasif</option>
                    <option value="1" {{ $uye->aktif_mi==1 ? 'selected' : '' }}>Aktif</option>
                </select>
              </div>
              </div>

              

                @if($uye->id == 0)
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Şifre</label>
                    <input type="password" name="password" value="{{ old('password',$uye->password) }}" class="form-control" placeholder="*********">
                  </div>
                  </div>
                @endif

             
            </div> 
           
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                      <label>İl</label>
                      <input type="text" class="form-control" name="il" value="{{ old('il', @$uye->il) }}" placeholder="İl">
                    </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>İlçe</label>
                        <input type="text" class="form-control" name="ilce" required value="{{ old('ilce', @$uye->ilce) }}" placeholder="İlçe">
                      </div>
                      </div>
                     
                    <div class="col-md-2">
                        <div class="form-group">
                          <label>Mahalle</label>
                          <input type="text" class="form-control" name="mahalle" value="{{ old('mahalle', @$uye->mahalle) }}" placeholder="Mahalle">
                        </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                              <label>Sokak</label>
                              <input type="text" class="form-control" name="sokak" value="{{ old('sokak',@$uye->sokak) }}" placeholder="Sokak">
                            </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label>Aparman Adı</label>
                                  <input type="text" class="form-control" name="apartman_no" value="{{ old('apartman_no',@$uye->apartman_no) }}" placeholder="Apartman No">
                                </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Kapı No</label>
                                      <input type="text" class="form-control" name="kapi_no" value="{{ old('kapi_no',@$uye->kapi_no) }}" placeholder="Kapı No">
                                    </div>
                                    </div>



                                    
            </div>
         
        </div>

          <div class="box-footer">
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> {{ $uye->id > 0 ? "Güncelle" : "Kaydet" }}</button>
          </div>
      </div>
    </form>


    <form action="{{ route('yonetici.uye.sifre') }}" method="POST">
        @csrf
      <div class="modal fade" id="sifreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
                  <div class="box-header with-border">
                      <h3 class="box-title">Şifre Güncelle</h3>
                  </div>
            
               
                 <input type="hidden" name="uye_id" value="{{ old('uye_id',$uye->id) }}" class="form-control">
                
            
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

