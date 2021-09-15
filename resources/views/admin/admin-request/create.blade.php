@extends('admin.layout.base')

@section('title', 'Add New Ride ')

@section('styles')
    <link href="{{asset('asset/css/slick.css')}}" rel="stylesheet">
    <style type="text/css">
        .car-radio .car-radio-inner img{
            height: 50px;
            -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
            filter: grayscale(100%);
        }
        .car-radio input[type=radio]{
            display: none;
        }
        .car-radio input:checked+label img{
            -webkit-filter: grayscale(0%); /* Safari 6.0 - 9.0 */
            filter: grayscale(0%);
        }
        .car-radio .name span{
            font-weight: 600;
            margin-bottom: 5px;
            display: inline-block;
        }
        .car-radio .rate{
            font-size: 13px;
        }
        .car-radio input:checked+label .name{
            margin:0;
        }
        .car-radio input:checked+label .name span{
            background-color: #111;
            padding: 7px 12px 2px;
            border-radius: 15px;
            color: #fff;
            display: inline-block;
            font-size: 10px;
            /* margin-bottom: 8px; */
            position: relative;
            top: -10px;
            min-width: 70px;
            margin-bottom: 2px;
            letter-spacing: 0.5px;
            font-weight: 100;
        }
        .car-radio input:checked+label img{
            -ms-transform: scale(1.2, 1.2); /* IE 9 */
            -webkit-transform: scale(1.2, 1.2); /* Safari */
            transform: scale(1.2, 1.2);
        }
        .car-radio{
            text-align: center;
            outline: none!important;
        }
        .car-radio .name{
            text-align: center;
        }
        .car-radio .price{
            text-align: center;
        }
        .car-radio img{
            margin:0 auto;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .load-radio .load-radio-inner img{
            height: 50px;
            -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
            filter: grayscale(100%);
        }
        .load-radio input[type=radio]{
            display: none;
        }
        .load-radio input:checked+label img{
            -webkit-filter: grayscale(0%); /* Safari 6.0 - 9.0 */
            filter: grayscale(0%);
        }
        .load-radio .name span{
            font-weight: 600;
            margin-bottom: 5px;
            display: inline-block;
        }
        .load-radio .rate{
            font-size: 13px;
        }
        .load-radio input:checked+label .name{
            margin:0;
        }
        .load-radio input:checked+label .name span{
            background-color: #111;
            padding: 7px 12px 2px;
            border-radius: 15px;
            color: #fff;
            display: inline-block;
            font-size: 10px;
            /* margin-bottom: 8px; */
            position: relative;
            top: -10px;
            min-width: 70px;
            margin-bottom: 2px;
            letter-spacing: 0.5px;
            font-weight: 100;
        }
        .load-radio input:checked+label img{
            -ms-transform: scale(1.2, 1.2); /* IE 9 */
            -webkit-transform: scale(1.2, 1.2); /* Safari */
            transform: scale(1.2, 1.2);
        }
        .load-radio{
            text-align: center;
            outline: none!important;
        }
        .load-radio .name{
            text-align: center;
        }
        .load-radio .price{
            text-align: center;
        }
        .load-radio img{
            margin:0 auto;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .slick-prev:before, .slick-next:before{
            font-family: 'FontAwesome';
        }

        .slick-next::before {
            content: "\f138";
            color: #000;
        }

        .slick-prev::before {
            content: "\f137";
            color: #000;
        }

        .slick-prev{
            left: 0;
            z-index: 99999;
        }

        .slick-next {
            right: 0px;
            z-index: 99999;
        }
        .car-detail{
            margin-top: 40px;
            margin-bottom: 40px;
        }
        .load-detail{
            margin-top: 40px;
            margin-bottom: 40px;
        }
        .no-margin{
            margin:0!important;
        }
        .admin-form input {
             border: 0;
             border-radius: 0;
             line-height: 10px;
            padding: 12px 15px 12px 12px;
             height: 45px;
             box-shadow: none !important;
        }
        .admin-form input {
             border: 1px solid #eee;
        }
        .user-list {
            max-height: 300px;
            width: calc(100% - 30px);
            position: absolute;
            z-index: 153;
        }
        .user-list li {
            display: block;
            width: 100%;
            padding: .5rem .75rem;
            font-size: 1rem;
        }
    </style>
@endsection

@section('content')
    <div class="content-area py-1">
        <div class="container-fluid">
            <div class="box box-block bg-white">
                <div class="row no-margin">
                    <div class="col-md-12">
                        <h4 class="page-title">@lang('user.ride.ride_now')</h4>
                    </div>
                </div>
                <div class="row no-margin admin-form">
                    <div class="col-md-6">
                        <form action="{{ route('admin.adminrequest.confirm') }}" method="GET" onkeypress="return disableEnterKey(event);">
                            <div class="form-group row" id="providers">
                                <label for="rental_providers" class="col-xs-3 col-form-label">@lang('user.ride.rental_providers')</label>
                                <div class="col-xs-9">
                                    <input type="number" class="form-control" id="rental_providers" name="rental_providers" placeholder="(Rental Providers)How many providers?" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="s_address" class="col-xs-3 col-form-label">@lang('user.ride.pickup_location')</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="origin-input" name="s_address"  placeholder="Enter pickup location">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="d_address" class="col-xs-3 col-form-label">@lang('user.ride.drop_location')</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="destination-input" name="d_address"  placeholder="Enter drop location" >
                                </div>
                            </div>

                            <input type="hidden" name="s_latitude" id="origin_latitude">
                            <input type="hidden" name="s_longitude" id="origin_longitude">
                            <input type="hidden" name="d_latitude" id="destination_latitude">
                            <input type="hidden" name="d_longitude" id="destination_longitude">
                            <input type="hidden" name="current_longitude" id="long">
                            <input type="hidden" name="current_latitude" id="lat">

                            <div class="car-detail">
                                @php $load_count = 0; $load_img = ''; @endphp
                                @foreach($services as $service)
                                    @if($service->type == "PERSON")
                                        <div class="car-radio">
                                            <input type="radio"
                                                   name="service_type"
                                                   value="{{$service->id}}"
                                                   id="service_{{$service->id}}"
                                                   data-type="person"
                                            @if ($loop->first) @endif>

                                            <label for="service_{{$service->id}}">
                                                <div class="car-radio-inner">
                                                    <div class="img"><img src="{{image($service->image)}}"></div>
                                                    <div class="name"><span>{{$service->name}}<p style="font-size: 10px;">(1-{{$service->capacity}})</p></span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    @else
                                        @php $load_count = $load_count + 1; if(!$load_img) $load_img = $service->image; @endphp
                                    @endif
                                @endforeach
                                @if($load_count)
                                    <div class="car-radio">
                                        <input type="radio"
                                               name="service_type"
                                               value="0"
                                               id="service_load">
                                        <label for="service_load">
                                            <div class="car-radio-inner">
                                                <div class="img"><img src="{{image($load_img)}}"></div>
                                                <div class="name"><span>@lang('servicetypes.LOAD')<p style="font-size: 10px;">({{$load_count}})</p></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                @endif
                            </div>

                            <div class="load-detail">
                                @foreach($services as $service)
                                    @if($service->type == "LOAD")
                                        <div class="load-radio">
                                            <input type="radio"
                                                   name="service_type"
                                                   value="{{$service->id}}"
                                                   id="service_{{$service->id}}"
                                                   data-type="load"
                                            @if ($loop->first) @endif>

                                            <label for="service_{{$service->id}}">
                                                <div class="load-radio-inner">
                                                    <div class="img"><img src="{{image($service->image)}}"></div>
                                                    <div class="name"><span>{{$service->name}}<p style="font-size: 10px;">({{$service->weight}}, {{$service->width}}x{{$service->height}})</p></span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="form-group row" id="hours">
                                <label for="rental_hours" class="col-xs-3 col-form-label">Rental Hours</label>
                                <div class="col-xs-9">
                                    <input type="number" class="form-control" id="rental_hours" name="rental_hours"  placeholder="(Rental Hours)How many hours?" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="submit" class="col-xs-3 col-form-label"></label>
                                <div class="col-xs-9">
                                    <button type="submit"  class="btn btn-primary">@lang('user.ride.ride_now')</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <div class="map-responsive">
                            <div id="map" style="width: 100%; height: 450px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('asset/js/slick.min.js')}}"></script>

    <script type="text/javascript">
        var current_latitude = 13.0574400;
        var current_longitude = 80.2482605;
    </script>

    <script type="text/javascript">
        if( navigator.geolocation ) {
            navigator.geolocation.getCurrentPosition( success, fail );
        } else {
            console.log('Sorry, your browser does not support geolocation services');
            initMap();
        }

        function success(position)
        {
            document.getElementById('long').value = position.coords.longitude;
            document.getElementById('lat').value = position.coords.latitude

            if(position.coords.longitude != "" && position.coords.latitude != ""){
                current_longitude = position.coords.longitude;
                current_latitude = position.coords.latitude;
            }
            initMap();
        }

        function fail()
        {
            // Could not obtain location
            console.log('unable to get your location');
            initMap();
        }
    </script>

    <script type="text/javascript">
        function disableEnterKey(e)
        {
            var key;
            if(window.e)
                key = window.e.keyCode; // IE
            else
                key = e.which; // Firefox

            if(key == 13)
                return e.preventDefault();
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#hours").hide();
            $(".load-detail").css('visibility', 'hidden');

            $('input[name=service_type]').change(function(){
                var id =     $('input[name=service_type]:checked').val();

                if (id != 0) {
                    var type = $('input[name=service_type]:checked').data("type");
                    if (type == "person") {
                        $(".load-detail").css('visibility', 'hidden');
                    }
                    $.ajax({url: "{{ url('hour') }}/"+id,dataType: "json",
                        success: function(data){
                            //console.log(data['calculator']);
                            if (data['calculator'] == 'DISTANCEHOUR')
                                $("#hours").show();
                            else
                                $("#hours").hide();
                        }
                    });
                } else {
                    $(".load-detail").css('visibility', 'visible');
                }
            });
        });
    </script>

    <script type="text/javascript" src="{{ asset('asset/js/map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ Setting::get('map_key') }}&libraries=places&callback=initMap" async defer></script>
@endsection