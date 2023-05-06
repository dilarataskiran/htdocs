@extends('Backend.layouts.master')
@section('title',"Kategori Bilgileri")
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
            Kategori Bilgileri   @if($kategori->id > 0)|

             <button type="button" data-toggle="modal" data-target="#sifreModal" class="btn btn-primary" ><i class="fa fa-unlock-alt"></i> Alt Kategori Oluştur</button>
             @endif
          </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('anasayfa') }}"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li><a href="{{ route('yonetici.kategoriler') }}"> Kategoriler</a></li>
        <li class="active">Kategori Detay</li>
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
         
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('yonetici.kategori.kaydet', $kategori->id)}}" method="POST">
                @csrf
                <div class="box box-default">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Kategori Adı</label>
                          <input type="text" class="form-control" required name="kategori_adi" value="{{ old('kategori_adi',$kategori->kategori_adi) }}" placeholder="Kategori Adı">
                        </div>
                        </div>
                     
                      <div class="col-md-6">
                      <div class="form-group">
                        <label>Kategori Durumu</label>
                        <select name="durum" class="form-control select2">
                            <option value="0" {{ $kategori->durum==0 ? 'selected' : '' }}>Pasif</option>
                            <option value="1" {{ $kategori->durum==1 ? 'selected' : '' }}>Aktif</option>
                        </select>
                      </div>
                      </div>
                     
                    </div> 
        
                 
                </div>
        
                  <div class="box-footer">
                  <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> {{ $kategori->id > 0 ? "Güncelle" : "Kaydet" }}</button>
                  </div>
              </div>
            </form>
        
        </div>
       @if($kategori->id > 0)
       <div class="col-md-4">
        <div class="box box-default">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>Kategori Adı</th>
                            <th>Durum</th>
                            <th>#</th>
                        </thead>
                        <tbody>
                            @foreach ($altKategoriler as $altKategori)
                                <tr>
                                    <td>{{ $altKategori->kategori_adi }}</td>
                                    <td>{{ $altKategori->durum==0 ? 'Pasif' : 'Aktif'  }}</td>
                                    <td>
                                        <a href="{{ route('yonetici.alt.kategori.sil',@$altKategori->id) }}">
                                            <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
       @endif
    </div>
   
    <form action="{{ route('yonetici.alt.kategori.kaydet',0) }}" method="POST">
        @csrf
      <div class="modal fade" id="sifreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
                  <div class="box-header with-border">
                      <h3 class="box-title">Alt Kategori Oluştur</h3>
                  </div>
            
               
                 <input type="text" name="ust_kategori_id" value="{{ old('ust_kategori_id',$kategori->id) }}" class="form-control">
                
            
             <div class="row">
               <div class="col-md-12">
                 <label >Kategoriler</label>
                    <select class="form-control select2" name="ust_kategori_id" id="">
                        <option value="0">Ana Kategori Seçiniz...</option>
                        @foreach ($kategoriler as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->kategori_adi }}</option>
                        @endforeach
                    </select>
               </div>
             </div>
             <div class="row">
               <div class="col-md-12">
                 <label>Kategori Adı</label>
                 <input type="text" name="kategori_adi" class="form-control" required>
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

