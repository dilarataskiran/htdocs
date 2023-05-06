<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <title>Sabun </title>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="icon" type="image/png" href="{{ asset('admin/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('admin/apple-touch-icon.png') }}">

        <link rel="stylesheet" href="{{ asset('admin/vendor.css') }}">

        <!-- Fontawesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"/>
        <!-- Dosis & Poppins Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;523;600;700;800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('admin/layouts/layout-1/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/auth.css') }}">
    </head>

    <body>

		<div id="app" class="login-page">

			<div class="container">
				<!-- Login Panel -->
				<div class="panel">
					<div class="row no-gutters">
	
						<div class="col-md-6 col-form">

                            <div class="panel-body panel-form">
    
                                <h1 class="form-title">Kayıt Ol</h1>
                                @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                   
                                    @foreach ($errors->all() as $error)
                                    • <span>{{ $error }}</span><br>
                                    @endforeach
                                    
                                </div>
                                @endif
                                <form action="{{ route('kayit') }}" method="POST">
                                    @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputFName">Ad Soyad</label>
                                        <div class="input-group input-group-merged">
                                            <input type="text" class="form-control" name="adsoyad" placeholder="Ad Soyad" value="{{ old('adsoyad') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail">Email</label>
                                        <div class="input-group input-group-merged">
                                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i class="fas fa-envelope"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputNumber">Telefon No</label>
                                        <div class="input-group input-group-merged">
                                            <input type="text" class="form-control" name="telefon" placeholder="Telefon No" value="{{ old('phone_number') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i class="fas fa-phone"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword">Şifre</label>
                                        <div class="input-group input-group-merged">
                                            <input type="password" class="form-control" name="password" placeholder="Şifre">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i class="fas fa-lock-open"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCPassword">Şifre Tekrarı</label>
                                        <div class="input-group input-group-merged">
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Şifre Tekrarı">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
    
    
                                <div class="form-group form-group-btns text-center mb-0">
                                    <div class="row no-gutters">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-block btn-lg btn-primary">Kayıt Ol</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-block btn-lg btn-outline-secondary">Anasayfa</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
    
                            </div>
    
                        </div>
	
						<div class="col-md-6">

							<div class="panel-body panel-image" style="background-image: url('https://www.casartcoverings.com/wp-content/uploads/2015/08/Daylight-Blue-Wide-3-Panel-Gradient_w.jpg');">
		
							</div>
	
						</div>
					
					</div><!-- .row -->
				</div><!-- / Login Panel -->
					
			</div><!-- .container -->

		</div>

        <script src="{{ asset('admin/vendor.js') }}"></script>
		<script src="{{ asset('admin/app.js') }}"></script>
    </body>
</html> 