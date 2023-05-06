@extends('Backend.layouts.master')
@section('title',"Ürün Yönetimi")
@section('content')
@section('head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
@endsection
 <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Ürünler| <a href="{{ route('yonetici.urun.yeni') }}"><button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Yeni Kayıt</button></a>
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{ route('anasayfa') }}"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li class="active">Ürün Yönetimi</li>
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
              <th>Sıra No</th>
              <th>Ürün Adı</th>
              <th>Slug</th>
              <th>Fiyat</th>
              <th>Durum</th>
              <th>Açıklama</th>           
              <th width="90">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach($urunler as $urun)
            <tr>
             
              <td>{{ @$urun->id  }}</td>
              <td>{{ @$urun->urun_adi  }}</td>
              <td>{{ @$urun->slug  }}</td>
              <td>{{ number_format($urun->fiyat,2)  }}</td>
              <td>{{ $urun->aktif_mi==1 ? 'Aktif' : 'Pasif'  }}</td>
              <td>{{ @$urun->aciklama  }}</td>
              <td>
                <a href="{{ route('yonetici.urun.duzenle',$urun->id) }}">
                    <button class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></button>
                  </a>
                  <a href="{{ route('yonetici.urun.sil',$urun->id) }}" onclick="return confirm('Seçilen Öğeyi Silmek İstediğinize Emin Misiniz?')">
                    <button class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button>
                  </a>
              </td>
            

            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Sıra No</th>
              <th>Ürün Adı</th>
              <th>Slug</th>
              <th>Fiyat</th>
              <th>Durum</th>
              <th>Açıklama</th>           
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
