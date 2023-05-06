<div class="wrapper">
    <header class="main-header">
    <a href="{{ route('anasayfa') }}" class="logo">
          <span class="logo-mini"><b>Y</b>R</span>
    <span class="logo-lg"><b>Yazılım</b>Reyonu</span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
				  <li class="dropdown user user-menu">
              <a href="#">               
                <span class="hidden-xs"></span>
              </a>
            </li>
           
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ asset('images/question.png') }}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ auth()->user()->adsoyad }}</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="{{ asset('images/question.png') }}" class="img-circle" alt="User Image">
                    <p>
                        {{ auth()->user()->name }} <br>
                        {{ auth()->user()->email }} <br>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div>
                    <form id="logout-form" action="{{ route('cikis') }}" method="POST" style="display:none">
                            @csrf
                    </form>
                    <a href="#" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" style="width:100%">Çıkış Yap</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
        </div>
        </nav>
        
      </header>
    