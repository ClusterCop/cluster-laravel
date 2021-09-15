@extends('user.layout.base')

@section('title', 'Dashboard ')

@section('content')

<div class="col-md-9">
    <div class="dash-content">
        <div class="row no-margin">
            <div class="col-md-12">
                <h4 class="page-title">@lang('user.ride.ride_now')</h4>
            </div>
        </div>
        @include('common.notify')
        <div class="row no-margin">
            <div class="col-md-6">
                <form action="{{url('confirm/ride')}}" method="GET" onkeypress="return disableEnterKey(event);">
                    <div class="input-group dash-form">
                        <input type="text" class="form-control" id="origin-input" name="s_address"  placeholder="Enter pickup location">
                    </div>

                    <div class="input-group dash-form">
                        <input type="text" class="form-control" id="destination-input" name="d_address"  placeholder="Enter drop location" >
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
                   
                    <div class="input-group dash-form" id="hours" >
                        <input type="number" class="form-control" id="rental_hours" name="rental_hours"  placeholder="(Rental Hours)How many hours?" >
                    </div>
                   
                    <button type="submit"  class="full-primary-btn fare-btn">@lang('user.ride.ride_now')</button>

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

@endsection

@section('scripts')    
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

<script type="text/javascript" src="{{ asset('asset/js/map.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ Setting::get('map_key') }}&libraries=places&callback=initMap" async defer></script>

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
    $(document).ready(function() {
        $("#hours").hide();
        $(".load-detail").css('visibility', 'hidden');

        $('input[name=service_type]').change(function () {
            var id = $('input[name=service_type]:checked').val();

            if (id != 0) {
                var type = $('input[name=service_type]:checked').data("type");
                if (type == "person") {
                    $(".load-detail").css('visibility', 'hidden');
                }
                $.ajax({
                    url: "{{ url('hour') }}/" + id, dataType: "json",
                    success: function (data) {
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

@endsection