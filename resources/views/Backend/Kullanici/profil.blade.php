@extends('Frontend.layouts.master')
@section('title',"Kullanıcı Ayarları")
@section('content')
<div class="content-wrapper">
  <div class="container">
    <section class="content-header">
      <h1>
        Kullanıcı Ayarları
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
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/avatar5.png') }}" alt="User profile picture">
              <h3 class="profile-username text-center">{{ auth()->user()->adsoyad }}</h3>
              <p class="text-muted text-center">{{ auth()->user()->email }}</p>
            <br>
              <div class="box-footer">
              <button type="button" data-toggle="modal" data-target="#sifreModal" class="btn btn-primary" style="width: 100%;"><i class="fa fa-unlock-alt"></i> Şifre Güncelle</button>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#ayar" data-toggle="tab">Profil Ayarları</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="ayar">
                <form action="{{ route('kullanici.kullanici.guncelle') }}" method="POST" class="form-horizontal">
                    @csrf
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Ad Soyad</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="adsoyad" placeholder="Ad Soyad" value="{{ old('adsoyad',auth()->user()->adsoyad) }}" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">İl</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="il" placeholder="İl" value="{{ old('il',auth()->user()->il) }}" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">İlçe</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ilce" placeholder="İlçe" value="{{ old('ilce',auth()->user()->ilce) }}" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Mahalle</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="mahalle" placeholder="Mahalle" value="{{ old('mahalle',auth()->user()->mahalle) }}" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Sokak</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="sokak" placeholder="Sokak" value="{{ old('sokak',auth()->user()->sokak) }}" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Apartman No</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="apartman_no" placeholder="Apartman No" value="{{ old('apartman_no',auth()->user()->apartman_no) }}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Kapı No</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="kapi_no" placeholder="Kapı No" value="{{ old('kapi_no',auth()->user()->kapi_no) }}" required>
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Telefon</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="telefon" placeholder="Telefon" value="{{ auth()->user()->telefon }}"  readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" readonly class="form-control" name="email" placeholder="Email" value="{{ old('email',auth()->user()->email) }}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Durum</label>
                    <input type="hidden" name="id" value="{{ auth()->user()->id }}"> 
                    <div class="col-sm-10">
                        <button class="btn btn-{{ auth()->user()->aktif_mi == 1 ? 'success' : 'danger'}}" style="width: 100%;" disabled>{{ auth()->user()->aktif_mi == 1 ? 'Aktif' : Pasif }}</button>
                    </div>
                  </div>
                  <div class="box-footer">
            <button class="btn btn-success pull-right"><i class="fa fa-check"></i> Güncelle</button>
          </div>
                </form>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
  </div>
    <!-- /.content -->
  </div>

  <form action="{{ route('kullanici.profil.sifre') }}" method="POST">
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
