@extends('Backend.layouts.master')
@section('title', 'Anasayfa')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            @if (session()->has('mesaj'))
                <div class="alert alert-{{ session('mesaj_tur') }}">
                    {{ session('mesaj') }}
                </div>
            @endif

            @if (auth()->user()->user_type == 1)
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Kullanıcı Bilgileri</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- form start -->
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                           
                                             <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Üye No :
                                                    :</label>

                                                <div class="col-sm-10">
                                                    <label for="inputEmail3" class="col-sm-2 control-label"
                                                        style="text-align: left;">{{ auth()->user()->name }}</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">TC Kimlik No
                                                    :</label>

                                                <div class="col-sm-10">
                                                    <label for="inputEmail3" class="col-sm-2 control-label"
                                                        style="text-align: left;">{{ auth()->user()->kayit->tckimlik_no }}</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Ad Soyad :
                                                </label>

                                                <div class="col-sm-10">
                                                    <label for="inputEmail3" class="col-sm-2 control-label"
                                                        style="text-align: left;">{{ auth()->user()->kayit->adsoyad }}
                                                        {{ auth()->user()->kayit->mutemet_no }}</label>
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Cep Telefonu
                                                    :</label>

                                                <div class="col-sm-10">
                                                    <label for="inputEmail3" class="col-sm-2 control-label"
                                                        style="text-align: left;">{{ auth()->user()->kayit->cep_telefonu }}</label>
                                                </div>
                                            </div>


                                            <div class="box-footer"></div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Banka Adı
                                                    :</label>

                                                <div class="col-sm-10">
                                                    <label for="inputEmail3" class="col-sm-2 control-label"
                                                        style="text-align: left;">{{ auth()->user()->kayit->banka_adi }}</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Banka Hesap No
                                                    :</label>

                                                <div class="col-sm-10">
                                                    <label for="inputEmail3" class="col-sm-2 control-label"
                                                        style="text-align: left;">{{ auth()->user()->kayit->banka_hesapno }}</label>
                                                </div>
                                            </div>


                                            <div class="box-footer">

                                            </div>

                                        </div>

                                    </form>
                                </div>


                                <div class="col-md-6">
                                    <br>
                                    <div class="table-responsive" style="color:#E23A39; font-size:16px; border: 3px solid ;">
                                        <table id="myTable" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Kesinti Tarihi</th>
                                                    <th><select name="gelenDeger1" id="gelenDeger1"
                                                            class="form-control select2">
                                                            <option value="01" selected
                                                                >
                                                                Ocak</option>
                                                            <option value="02"
                                                               >
                                                                Şubat</option>
                                                            <option value="03"
                                                               >
                                                                Mart</option>
                                                            <option value="04"
                                                               >
                                                                Nisan</option>
                                                            <option value="05"
                                                                >
                                                                Mayıs</option>
                                                            <option value="06"
                                                                >
                                                                Haziran</option>
                                                            <option value="07"
                                                               >
                                                                Temmuz</option>
                                                            <option value="08"
                                                                >
                                                                Ağustos</option>
                                                            <option value="09"
                                                                >
                                                                Eylül</option>
                                                            <option value="10"
                                                                >
                                                                Ekim</option>
                                                            <option value="11"
                                                                >
                                                                Kasım</option>
                                                            <option value="12"
                                                                >
                                                                Aralık</option>
                                                        </select></th>
                                                </tr>
                                                <tr>
                                                    <th>Ödeme Türü</th>
                                                    <th>Ödenecek Tutar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                  
                                                    <tr id="pesinAlisveris_">
                                                        <td>Peşin Alışverişler</td>
                                                        <td id="pesinAlisveris"></td>
                                                    </tr>
                                               


                                               
                                                    <tr id="taksitliAlisveris_">
                                                        <td>Taksitli Alışverişler</td>
                                                        <td id="taksitliAlisveris"></td>
                                                    </tr>
                                               

                                              

                                               
                                                    <tr id="aidat_">
                                                        <td>Depozito ve Aidatlar</td>
                                                        <td id="aidat"></td>
                                                    </tr>
                                               
                                                    <tr id="mevduatOdemeOncesi1_">
                                                        <td>Finans 1 | Ödeme Öncesi</td>
                                                        <td id="mevduatOdemeOncesi1"></td>
                                                    </tr>
                                               
                                                    <tr id="mevduatOdemeSonrasi1_">
                                                        <td>Finans 1 | Ödeme Sonrası</td>
                                                        <td id="mevduatOdemeSonrasi1"></td>
                                                    </tr>
                                               
                                                    <tr id="mevduatOdemeOncesi2_">
                                                        <td>Finans 2 | Ödeme Öncesi</td>
                                                        <td id="mevduatOdemeOncesi2"></td>
                                                    </tr>
                                               
                                                    <tr id="mevduatOdemeSonrasi2_">
                                                        <td>Finans 2 | Ödeme Sonrası</td>
                                                        <td id="mevduatOdemeSonrasi2"></td>
                                                    </tr>
                                               
                                                    <tr id="mevduatOdemeOncesi3_">
                                                        <td>Finans 3 | Ödeme Öncesi</td>
                                                        <td id="mevduatOdemeOncesi3"></td>
                                                    </tr>
                                                
                                                    <tr id="mevduatOdemeSonrasi3_">
                                                        <td>Finans 3 | Ödeme Sonrası</td>
                                                        <td id="mevduatOdemeSonrasi3"></td>
                                                    </tr>
                                               
                                                    <tr id="evlilik_">
                                                        <td>Evlilik</td>
                                                        <td id="evlilik"></td>
                                                    </tr>
                                                
                                                    <tr id="saglik_">
                                                        <td>Sağlık</td>
                                                        <td id="saglik"></td>
                                                    </tr>
                                                
                                                    <tr id="dogum_">
                                                        <td>Doğum</td>
                                                        <td id="dogum"></td>
                                                    </tr>
                                               
                                                <tr>
                                                    <td><b>Toplam Tutar :</b></td>
                                            
                                                    <td><b id="toplam"></b></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- ÖĞRENCİ CONTENT BİTİŞ -->


        </section>
    </div>
@endsection
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print', , 'pageLength'
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                "order": [
                    [1, "desc"]
                ]
            });
        });
    </script>

    <script>
        setTimeout(function() {
            $('.alert').slideUp('slow');
        }, 3000);
    </script>
@endsection
