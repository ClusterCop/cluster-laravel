@extends('user.layout.app')

@section('content')
<!-- <div class="banner row no-margin" style="background-image: url('{{ asset('asset/img/banner-bg.jpg') }}');">
    <div class="banner-overlay"></div>
    <div class="container">
        <div class="col-md-8">
            <h2 class="banner-head"><span class="strong">Get there</span><br>Your day belongs to you</h2>
        </div>
        <div class="col-md-4">
            <div class="banner-form">
                <div class="row no-margin fields">
                    <div class="left">
                        <img src="{{ asset('asset/img/ride-form-icon.png') }}">
                    </div>
                    <div class="right">
                        <a href="{{url('login')}}">
                            <h3>Entrar como usuario</h3>
                            <h5>Regístrate <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                <div class="row no-margin fields">
                    <div class="left">
                        <img src="{{ asset('asset/img/ride-form-icon.png') }}">
                    </div>
                    <div class="right">
                        <a href="{{ url('/provider/register') }}">
                            <h3>Entrar como Conductor</h3>
                            <h5>Regístrate <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                <p class="note-or">Or <a href="{{ url('/provider/login') }}">Iniciar sesión</a> with your rider account.</p>
            </div>
        </div>
    </div>
</div> -->
<div class="banner row no-margin" style="background-position: center; background-image: url('{{ asset('asset/img/slider-bg-1.jpg') }}');">
    <div class="banner-overlay"></div>
    <div class="container slider pad-60">
        <div class="row">
        <div class="col-md-12 center ">

            <h2 class="banner-head">{{ env('APP_DISPLAY_NAME', 'Transit') }}<br>¡Todo el transporte, en una sola App!</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-3">
             <div class="row no-margin fields banner-ride-drive">
                    <div class="btn-icon">
                        <img src="{{ asset('asset/img/destination.png') }}">
                    </div>
                    <div class="btn-txt">
                        <a href="{{url('login')}}">
                            <h3 class="btn-title">Usuarios</h3>
                            <!-- <h5>Regístrate <i class="fa fa-chevron-right"></i></h5> -->
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
             <div class="row no-margin fields banner-ride-drive">
                    <div class="left">
                        <img src="{{ asset('asset/img/taxi-car.png') }}">
                    </div>
                    <div class="right">
                        <a href="{{ url('/provider/login') }}">
                            <h3 class="btn-title">Conductores</h3>
                            <!-- <h5>Regístrate <i class="fa fa-chevron-right"></i></h5> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="banner-form">
                <div class="row no-margin fields">
                    <div class="left">
                        <img src="{{ asset('asset/img/ride-form-icon.png') }}">
                    </div>
                    <div class="right">
                        <a href="{{url('login')}}">
                            <h3>Entrar como usuario</h3>
                            <h5>Regístrate <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                <div class="row no-margin fields">
                    <div class="left">
                        <img src="{{ asset('asset/img/ride-form-icon.png') }}">
                    </div>
                    <div class="right">
                        <a href="{{ url('/provider/register') }}">
                            <h3>Entrar como Conductor</h3>
                            <h5>Regístrate <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                <p class="note-or">Or <a href="{{ url('/provider/login') }}">Iniciar sesión</a> with your rider account.</p>
            </div>
        </div> -->
    </div>
</div>
<div class="row white-section pad-60">
    <div class="container">
        <div class="col-md-6 img-box text-center"> 
            <img src="{{ asset('asset/img/screen-bg.png') }}">
        </div>
        <div class="col-md-6">
             <div class="content-block">
              <div class="icon"><img src="{{ asset('asset/img/taxi-app.png') }}"></div>
            <h2>Tocas un botón y llegas a un destino ¡así de simple!</h2>
            <div class="title-divider"></div>
            <p>Un servicio plus, un taxi o viajar con tu mascota. Una App que sabe exactamente lo que quieres y puedes pagar en efectivo con tarifas siempre fijas.</p>
            <a class="content-more more-btn" href="{{url('/ride')}}">Mas razones para viajar <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
    </div>
</div>

<div class="row gray-section pad-60">
    <div class="container">                
        <div class="col-md-6">
            <div class="content-block">
            <div class="icon"><img src="{{ asset('asset/img/destination.png') }}"></div>
            <h2>Cualquier destino en cualquier momento</h2>
            <div class="title-divider"></div>
            <p>¿Rumbo al trabajo, diligencias por la ciudad o una salida en la noche con tus amigos?<br>{{ env('APP_DISPLAY_NAME', 'Transit') }} llega a donde quieras ir sin necesidad de reservaciones, llamadas o tarifas elevadas.</p>
            <a class="content-more more-btn" href="{{url('/ride')}}">Mas razones para viajar <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
        <div class="col-md-6 img-box text-center"> 
            <img src="{{ asset('asset/img/screen-bg-3.png') }}">
        </div>
    </div>
</div>

<div class="row white-section pad-60">
    <div class="container">
        <div class="col-md-6 img-box text-center"> 
            <img src="{{ asset('asset/img/screen-bg-4.png') }}">
        </div>
        <div class="col-md-6 content-block">
              <div class="icon"><img src="{{ asset('asset/img/budget.png') }}"></div>
            <h2>¿Te preocupan las tarifas dinámicas? ¡a nosotros también!</h2>
            <div class="title-divider"></div>
            <p>{{ env('APP_DISPLAY_NAME', 'Transit') }} siempre te ofrece un Limpio, cómodo y bonito auto.<br>Pensamos que no siempre es necesario pagar máspor un excelente servicio, con {{ env('APP_DISPLAY_NAME', 'Transit') }} haces la mejor
elección.</p>
            <a class="content-more more-btn" href="{{url('/ride')}}">Mas razones para viajar <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</div>

<div class="row gray-section pad-60 full-section">
    <div class="container">
        <div class="col-md-6 content-block">
              <div class="icon"><img src="{{ asset('asset/img/car-wheel.png') }}"></div>
            <h2>Tan colombianos como tú</h2>
            <div class="title-divider"></div>
            <p>Gracias a nuestros incentivos, logramos que los conductores tengan el más alto compromiso.<br>Esto hace que la experiencia en {{ env('APP_DISPLAY_NAME', 'Transit') }} sea genial, madres, padres, profesores, alumnos, vecinos oamigos, conectados en una plataforma hecha en casa.</p>
            <a class="content-more more-btn" href="{{ url('/drive') }}">Por que conducir con {{ Setting::get('site_title', 'Tranxit')  }} <i class="fa fa-chevron-right"></i></a>
        </div>
        <div class="col-md-6 full-img text-center" style="background-image: url({{ asset('asset/img/behind-the-wheel.jpg') }});"> 
            <!-- <img src="img/anywhere.png"> -->
        </div>
    </div>
</div>

<div class="row white-section pad-60 ">
    <div class="container">
        <div class="col-md-6 img-box text-center"> 
            <img src="{{ asset('asset/img/cost-cities.png') }}">
        </div>
        <div class="col-md-6 content-block">
              <div class="icon"><img src="{{ asset('asset/img/taxi-location.png') }}"></div>
            <h2>Ayudando a ciudades para el beneficio de todos</h2>
            <div class="title-divider"></div>
            <p>Logramos que personas tengan ingresos adicionales y colaboramos con la movilidad de los ciudadanos.</p>
            <a class="content-more more-btn" href="{{ url('/login') }}">Regístrate <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</div>

<div class="row gray-section pad-60 full-section">
    <div class="container">
        <div class="col-md-6 content-block">
              <div class="icon"><img src="{{ asset('asset/img/seat-belt.png') }}"></div>
            <h2>Comprometidos con tu seguridad</h2>
            <div class="title-divider"></div>
            <p>Dentro de la experiencia {{ env('APP_DISPLAY_NAME', 'Transit') }}, velamos por tu seguridad en cada fase del trayecto.</p>
            <a class="content-more more-btn" href="{{ url('/login') }}">Regístrate <i class="fa fa-chevron-right"></i></a>
        </div>
        <!-- <div class="col-md-6 img-box text-center"> 
            <img src="{{ asset('asset/img/seat-belt.jpg') }}">
        </div> -->
        <div class="col-md-6 full-img text-center" style="background-image: url({{ asset('asset/img/safty-bg.jpg') }});"> 
            <!-- <img src="img/anywhere.png"> -->
        </div>
    </div>
</div>
<div class="row find-city">
    <div class="container pad-60 content-block center">
        <h2>¿{{ env('APP_DISPLAY_NAME', 'Transit') }} está en tu ciudad?</h2>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
        <form>
            <div class="input-group find-form">
                <input type="text" class="form-control" placeholder="Search" id="origin-input">
                <div id="map" style="display: none;"></div>
                <span class="input-group-addon">
                    <button type="button" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-2x fa-arrow-right"></i>
                    </button>  
                </span>
            </div>           
        </form>
    </div>
</div>
    </div>
</div>
<!-- <div class="row app-dwon pad-60">
    <div class="container pad-60"">
        <div class="row center">
            <h2>Get App on</h2>
            <div class="col-md-3 col-md-offset-3">
                 
             <a href="{{Setting::get('store_link_ios','#')}}">
            <img src="{{asset('asset/img/appstore.png')}}">
                                        </a>
            </div>
            <div class="col-md-3">
             <a href="{{Setting::get('store_link_android','#')}}">
                                            <img src="{{asset('asset/img/playstore.png')}}">
                                        </a>
                                    </div>
        </div>
    </div>
</div>

    <div class="container footer-social content-block pad-60"">
        <div class="row center">
            <h2>Get Connect with Scoical Media</h2>
            <div class="col-md-6 col-md-offset-3">
                 <div class="socil-media">
                   <ul>
                                    <li><a href="#"><i class="fa fa-2x fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-2x fa-twitter"></i></a></li>
                                </ul>
                 </div>
             </div>
    </div>
</div> -->



<!-- <div class="footer-city row no-margin" style="background-image: url({{ asset('asset/img/footer-city.png') }});"></div> -->
@endsection