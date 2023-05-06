<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('images/question.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->adsoyad }}</p>
          <a href="#"><i class="fa fa-th text-success"></i> Online  </a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">YÖNETİM PANELİ</li>
        <li><a href="{{ route('yonetici.dashboard') }}"><i class="fa fa-home"></i> <span>Anasayfa</span></a></li>

        @can('yonetici')
       
        <li><a href="{{ route('yonetici.uyeler') }}"><i class="fa fa-users"></i> <span>Üyeler</span></a></li>
        <li><a href="{{ route('yonetici.urunler') }}"><i class="fa fa-cubes"></i> <span>Ürünler</span></a></li>
        <li><a href="{{ route('yonetici.siparisler') }}"><i class="fa fa-shopping-cart"></i> <span>Siparişler</span></a></li>
       

      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Ayarlar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('yonetici.ayar.profil')}} "><i class="fa fa-circle-o"></i> Kullanıcı Ayarları</a></li>
           
          
        </li>
        @endcan
        
        
   
      </ul>
    
    </section>
  </aside>
