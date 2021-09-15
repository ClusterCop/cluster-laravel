@extends('user.layout.app')

@section('content')
<div class="banner row no-margin" style="background-image: url('{{ asset('asset/img/banner-bg.jpg') }}');">
    <div class="banner-overlay"></div>
    <div class="container pad-60">
        <div class="col-md-8">
            <h2 class="banner-head"><span class="strong">¡Sin horarios y sin jefes!</span><br>Conduce cuando quieras y generas lo que necesites.</h2>
        </div>
        <div class="col-md-4">
            <div class="banner-form">
                <div class="row no-margin fields">
                    <div class="left">
                    	<img src="{{asset('asset/img/taxi-app.png')}}">
                    </div>
                    <div class="right">
                        <a href="{{url('login')}}">
                            <h3>Viaja con {{Setting::get('site_title','Tranxit')}}</h3>
                            <h5>Iniciar sesión <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>

                <div class="row no-margin fields">
                    <div class="left">
                    	<img src="{{asset('asset/img/taxi-app.png')}}">
                    </div>
                    <div class="right">
                        <a href="{{url('provider/login')}}">
                            <h3>Iniciar como conductor</h3>
                            <h5>Iniciar sesión <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>

                <!-- <p class="note-or">Or <a href="{{ url('login') }}">Iniciar sesión</a> with your rider account.</p> -->
            </div>
        </div>
    </div>
</div>

<div class="row white-section pad-60 no-margin">
    <div class="container">
        
        <div class="col-md-4 content-block small">
             <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/driving-license.png')}}"></div>
            <h2>Establece tu propio horario</h2>
            <div class="title-divider"></div>
            <p>Puedes conducir con {{ env('APP_DISPLAY_NAME', 'Transit') }} en cualquier momento, día o noche, los 365 días del año. Cuando conduces siempre depende de ti, así que nunca interfiere con las cosas importantes en tu vida.</p>
        </div>
    </div>

        <div class="col-md-4 content-block small">
             <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/destination.png')}}"></div>
            <h2>Realizas más dinero en cada momento</h2>
            <div class="title-divider"></div>
            <p>Las tarifas de viaje comienzan con una cantidad base, luego aumentan con el tiempo y la distancia.</p>
        </div>
    </div>

        <div class="col-md-4 content-block small">
             <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/taxi-app.png')}}"></div>
            <h2>Deja que la aplicación lidere el camino</h2>
            <div class="title-divider"></div>
            <p>Obtendrás instrucciones detalladas y herramientas que te ayudaran a trazar la mejor ruta, además conocerás el monto exacto que debe realizar cada usuario.</p>
        </div>
    </div>

    </div>
</div>

<div class="row gray-section no-margin full-section">
    <div class="container">                
        <div class="col-md-6 content-block">
            <div class="icon"><img src="{{asset('asset/img/taxi-car.png')}}"></div>
            <h3>Acerca de la aplicación</h3>
            <h2>Fácil y ligera de manejar</h2>
            <div class="title-divider"></div>
            <p>Cuando quieras ganar dinero, solo abre la aplicación y comenzarás a recibir solicitudes de viaje. Obtendrás información sobre tu usuario y dirección de su ubicación. Cuando el viaje termine, recibirás otra solicitud cercana y de esta manera aumentaras tus ingresos rápidamente.</p>
            <a class="content-more more-btn" href="{{url('login')}}">SEE HOW IT WORKS <i class="fa fa-chevron-right"></i></a>
        </div>
        <div class="col-md-6 full-img text-center" style="background-image: url({{ asset('asset/img/driver-car.jpg') }});"> 
            <!-- <img src="img/anywhere.png"> -->
        </div>
    </div>
</div>

<div class="row white-section pad-60 no-margin">
    <div class="container">
        
        <div class="col-md-4 content-block small">
            <div class="box-shadow" style="height: 520px;">
                <div class="icon"><img src="{{asset('asset/img/budget.png')}}"></div>
            <h2>Recompensa</h2>
            <div class="title-divider"></div>
            <p>Al conducir con {{ env('APP_DISPLAY_NAME', 'Transit') }} obtendrás la mejor tasa del País, Tan solo un 8% con tarifas siempre justas.</p>
        </div></div>

        <div class="col-md-4 content-block small">
            <div class="box-shadow" style="height: 520px;">
                <div class="icon"><img src="{{asset('asset/img/driving-license.png')}}"></div>
            <h2>Requisitos</h2>
            <div class="title-divider"></div>
            <p>¿listo o lista para conducir?</p>
            <p>Nuestros requisitos son:</p>
            <p>-Documento de identidad<br>-Licencia de conducción<br>-Vehículos cuatro puertas 2005 en adelante.<br>-Documentos de tu vehículo en regla.</p>
            <p>Estos entraran en un estudio de seguridad y serás notificado cuando estés apto o apta para conducir.</p>
        </div></div>

        <div class="col-md-4 content-block small">
            <div class="box-shadow" style="height: 520px;">
                <div class="icon"><img src="{{asset('asset/img/seat-belt.png')}}"></div>
            <h2>Seguridad</h2>
            <div class="title-divider"></div>
            <p>Todos los pasajeros son verificados con su información personal y número de teléfono, para que sepa a quién va a recoger y nosotros también.</p>
        </div></div>

    </div>
</div>
            
<div class="row find-city no-margin">
    <div class="container">
        <div class="col-md-12 center content-block">
            <div class="box-shadow">
                <div class="pad-60 ">
        <h2>Comienza a ganar dinero</h2>
        <p>¿Listo para ganar dinero? El primer paso es registrarse en línea.</p>
<a class="content-more more-btn" href="{{url('login')}}">COMIENCE A CONDUCIR AHORA <i class="fa fa-chevron-right"></i></a>
        <!-- <button type="submit" class="full-primary-btn drive-btn">START DRIVE NOW</button> -->
    </div>
</div>
</div>
    </div>
</div>

<!-- <div class="footer-city row no-margin" style="background-image: url({{ asset('asset/img/footer-city.png') }});"></div> -->
@endsection