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
                                <h5>Regístrate <i class="fa fa-chevron-right"></i></h5>
                            </a>
                        </div>
                    </div>

                   <!--  <p class="note-or">Or <a href="{{url('provider/login')}}">Iniciar sesión</a> with your driver account.</p> -->
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row white-section pad-60 no-margin">
        <div class="container ">
            
            <div class="col-md-4 content-block small">
                <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/taxi-app.png')}}"></div>
                <h2>Tocas un botón y llegas a un destino ¡así de simple!</h2>
                <div class="title-divider"></div>
                <p>Un servicio plus, un taxi o viajar con tu mascota. Una App que sabe exactamente lo que quieres y puedes pagar en efectivo con tarifas siempre fijas.</p>
            </div>
        </div>

            <div class="col-md-4 content-block small">
                 <div class="box-shadow">
                 <div class="icon"><img src="{{asset('asset/img/destination.png')}}"></div>
                <h2>A donde quieras ir</h2>
                <div class="title-divider"></div>
                <p>Tú eliges el destino y nosotros te llevamos 24/7</p>
            </div>
        </div>

            <div class="col-md-4 content-block small">
                 <div class="box-shadow">
                 <div class="icon"><img src="{{asset('asset/img/budget.png')}}"></div>
                <h2>Tu calificas y nosotros te escuchamos</h2>
                <div class="title-divider"></div>
                <p>Califica a tu conductor y deja los comentarios sobre tu viaje. Tu opinión nos ayuda hacer de cada viaje, una experiencia 5 estrellas.</p>
            </div>
        </div>


        </div>
    </div>

    <div class="row gray-section pad-60">
        <div class="container content-block"> 
         <div class="icon"><img src="{{ asset('asset/img/destination.png') }}"></div>               
            <h2>{{ env('APP_DISPLAY_NAME', 'Transit') }} te da opciones para cada gusto</h2>

            <div class="car-tab">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#economy">Economía</a></li>
                  <li><a data-toggle="tab" href="#premium">Comodidad</a></li>
                  <li><a data-toggle="tab" href="#accessibility">Seguridad</a></li>
                  <li><a data-toggle="tab" href="#carpool">Confianza</a></li>
                </ul>

                <div class="tab-content">
                  <div id="economy" class="tab-pane fade in active">
                    <div class="car-slide">
                        <img src="{{asset('/asset/img/car-slide1.png')}}">
                    </div>
                  </div>
                  <div id="premium" class="tab-pane fade">
                    <div class="car-slide">
                        <img src="{{asset('/asset/img/car-slide2.png')}}">
                    </div>
                  </div>
                  <div id="accessibility" class="tab-pane fade">
                    <div class="car-slide">
                        <img src="{{asset('/asset/img/car-slide3.png')}}">
                    </div>
                  </div>

                  <div id="carpool" class="tab-pane fade">
                    <div class="car-slide">
                        <img src="{{asset('/asset/img/car-slide4.png')}}">
                    </div>
                  </div>


                </div>
            </div>
        </div>
    </div>


    <div class="row white-section pad-60">
        <div class="container">
            
            <div class="col-md-6 content-block">
                 <div class="icon"><img src="{{ asset('asset/img/budget.png') }}"></div>    
                <h4>Precio</h4>
                <h2>Estima la tarifa</h2>
                <div class="title-divider"></div>
                <form method="post" id="idForm" onsubmit="return">

                    {{ csrf_field() }}
                <div class="input-group fare-form">
                    <input type="text" class="form-control"  placeholder="Enter pickup location" id="origin-input" name="s_address">                               
                </div>

                <div class="input-group fare-form no-border-right">
                    <input type="text" class="form-control"  placeholder="Enter drop location" id="destination-input" name="d_address">
                   
                </div>
                

                <div class="input-group fare-form no-border-right">
                <select id="service_type" name="service_type" required  class="form-control">
                @foreach($services as $list_service)
                <option value="{{$list_service->id}}">{{$list_service->name}}</option>
                @endforeach
                </select>
                </div>

                 <input type="hidden" name="s_latitude" id="origin_latitude">
                    <input type="hidden" name="s_longitude" id="origin_longitude">
                    <input type="hidden" name="d_latitude" id="destination_latitude">
                    <input type="hidden" name="d_longitude" id="destination_longitude">
                    <input type="hidden" name="current_longitude" id="long">
                    <input type="hidden" name="current_latitude" id="lat">


              
                 <button type="submit" id="btnSubmit" class="full-primary-btn fare-btn">RIDE NOW</button>

                <div id="div1" class="full-primary-btn fare-btn"  style="text-align: center; display: none"></div>
                        
                <div id="div2" class="full-primary-btn fare-btn" style="text-align: center; display: none"></div>

                </form>
            </div>

            <div class="col-md-6 map-right">
                <div class="map-responsive" style="padding-bottom: 73.25%;"">
                    <div id="map" style="width: 100%; height: 450px;"></div>
                </div>                                
            </div>
            
        </div>
    </div>          

    <!-- <div class="row gray-section no-margin">
        <div class="container">                
            <div class="col-md-6 content-block">
                <h2>Safety Putting people first</h2>
                <div class="title-divider"></div>
                <p>Whether riding in the backseat or driving up front, every part of the {{ Setting::get('site_title', 'Tranxit') }} experience has been designed around your safety and security.</p>
                <a class="content-more" href="#">HOW WE KEEP YOU SAFE <i class="fa fa-chevron-right"></i></a>
            </div>
            <div class="col-md-6 img-block text-center"> 
                <img src="{{asset('asset/img/seat-belt.jpg')}}">
            </div>
        </div>
    </div> -->
    <div class="row gray-section pad-60 full-section">
    <div class="container">
        <div class="col-md-6 content-block">
              <div class="icon"><img src="{{ asset('asset/img/seat-belt.png') }}"></div>
            <h2>Comprometidos con tu seguridad</h2>
            <div class="title-divider"></div>
            <p>Dentro de la experiencia {{ env('APP_DISPLAY_NAME', 'Transit') }}, velamos por tu seguridad en cada fase del trayecto.</p>
            <a class="content-more more-btn" href="{{url('login')}}">Regístrate <i class="fa fa-chevron-right"></i></a>
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
                <input type="text" class="form-control"  placeholder="Search" id="mode-selector" name="s_address1">  
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
    <!-- <div class="row find-city no-margin">
        <div class="container">
            <h2>{{Setting::get('site_title','Tranxit')}} is in your city</h2>
            <form>
                <div class="input-group find-form">
                    <input type="text" class="form-control"  placeholder="Search" >
                    <span class="input-group-addon">
                        <button type="submit">
                            <i class="fa fa-arrow-right"></i>
                        </button>  
                    </span>
                </div>
            </form>
        </div>
    </div> -->
    <?php $footer = asset('asset/img/footer-city.png'); ?>
    <!-- <div class="footer-city row no-margin" style="background-image: url({{$footer}});"></div> -->
@endsection


@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function () {

    $("#btnSubmit").click(function (event) {


    event.preventDefault();

    $.ajax({
       type: "POST",
       url: "{{url('/fare')}}",
       data: $("#idForm").serialize(),

       success: function(data)
       { 
           $("#div1").show();
           $("#div2").show();
           $("#btnSubmit").hide();
           $("#div1").html("Estimated Fare - "+data.estimated_fare+"$");
           $("#div2").html("Distance - "+data.distance+"mile(s)");


       }
     });


 

   });

});

</script>


@endsection



