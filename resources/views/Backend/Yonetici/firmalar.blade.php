@extends('layouts.master')
@section('title',"Firmalar")
@section('content')
@section('head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
@endsection
 <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Firmalar | <a href="{{ route('managers.firma.yeni') }}"><button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Yeni Kayıt</button></a>
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{ route('anasayfa') }}"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li class="active">Firmalar</li>
      </ol>
    </section>
    <section class="content">
    @if(session()->has('mesaj_tur'))
    <div class="alert alert-{{ session('mesaj_tur') }}">
      {{ session('mesaj') }}
    </div>
    @endif
        <div class="row">
          <div class="col-xs-12">
    <div class="box">
        <div class="box-body">
          <table id="example" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Firma Kodu</th>
              <th>Firma Adı</th>
              <th>Telefon No</th>
              <th>Komisyon</th>
          
              <th width="90">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach($firmalar as $firma)
            <tr>
              <td>{{ $firma->firma_kodu }}</td>
              <td>{{ $firma->firma_adi  }}</td>
              <td>{{ $firma->telefon_no  }}</td>
              <td>{{ $firma->komisyon }}</td>
             
              <td>
                <a href="{{ route('managers.firma.duzenle',$firma->id) }}">
                    <button class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></button>
                  </a>
                  <a href="{{ route('managers.firma.duzenle',$firma->id) }}">
                    <button class="btn btn-sm btn-info"><i class="fa fa-eye"></i></button>
                  </a>
                  <a href="{{ route('managers.firma.sil',$firma->id) }}" onclick="return confirm('Seçilen Öğeyi Silmek İstediğinize Emin Misiniz?')">
                    <button class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button>
                  </a>
              </td>
            

            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Firma Kodu</th>
              <th>Firma Adı</th>
              <th>Telefon No</th>
              <th>Komisyon</th>
            
              <th width="90">İşlemler</th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    </div>
    
   </section>
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
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script>
  setTimeout(function(){
    $('.alert').slideUp('slow');}
    ,3000);
</script>
  @endsection
