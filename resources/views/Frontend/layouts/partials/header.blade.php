<style>
  a.disabled {
  pointer-events: none;
  cursor: default;
}
</style>
<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ route('anasayfa') }}" class="navbar-brand"><b>Sabun Sat</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
         
         @can('kullanici')
         <ul class="nav navbar-nav">
          <li><a href="{{ route('kullanici.ayar.profil') }}">Profilim <span class="sr-only">(current)</span></a></li>
          <li><a href="{{ route('kullanici.siparislerim') }}">Siparişlerim</a></li>
         
        </ul>
         @endcan

        </div><!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
             @if(@auth()->user()->id > 0)
             <form id="logout-form" action="{{ route('cikis') }}" method="POST" style="display:none">
              @csrf
      </form>
          <li>
            <a href="#"  onclick="event.preventDefault(); document.getElementById('logout-form').submit()" style="width:100%">Çıkış Yap</a>
          </li>
             @else
             <li>
              <a href="{{ route('giris') }}">Giriş Yap</a>
            </li>

            <li>
              <a href="{{ route('kayit') }}">Kayıt Ol</a>
            </li>
             @endif
            
             @can('yonetici')
              <li>
                <a href="{{ route('yonetici.dashboard') }}">Yönetici Paneli</a>
              </li>
             @endcan
             
              <li class="dropdown tasks-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-shopping-cart"></i>
                  <span class="label label-warning">{{ count($cartItems) }}</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Sepetinizde {{ count($cartItems) }} adet ürün var.</li>
                  <li>
                    <!-- Inner menu: contains the tasks -->
                    <ul class="menu">
                     @foreach($cartItems as $item)
                     <li><!-- Task item -->
                      <a href="#" class="disabled">
                        <!-- Task title and progress text -->
                        <h3>
                         {{ $item->name }}
                          <small class="pull-right">{{ $item->quantity }}</small>
                        </h3>
                        <!-- The progress bar -->
                        <div>
                          <!-- Change the css width attribute to simulate progress -->
                          <div>
                           Ürün Fiyatı :  <span>{{ $item->price * $item->quantity }}</span>
                          </div>
                        </div>
                      </a>
                    </li><!-- end task item -->
                     @endforeach
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="{{ route('cart.list') }}">Sepeti Görüntüle</a>
                  </li>
                </ul>
              </li>
              <!-- User Account Menu -->
              @if ( @auth()->user()->id > 0)
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{ auth()->user()->adsoyad }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }} " class="img-circle" alt="User Image">
                    <p>
                      {{ auth()->user()->adsoyad }}
                      <small>Apartman : {{ auth()->user()->apartman_no }}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profilim</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Güvenli Çıkış</a>
                    </div>
                  </li>
                </ul>
              </li>
              @endif
            </ul>
          </div><!-- /.navbar-custom-menu -->
      </div><!-- /.container-fluid -->
    </nav>
  </header>