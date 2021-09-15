@extends('admin.layout.base')

@section('title', 'Ride Information ')

@section('content')
    <div class="content-area py-1">
        <div class="container-fluid">
            <div class="box box-block bg-white">
                <div class="row no-margin">
                    <div class="col-md-12">
                        <h4 class="page-title">@lang('user.ride.ride_info')</h4>
                        <a href="{{url('/admin/adminrequest/create')}}" style="margin-left: 1em;margin-top: -30px" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                <div class="row no-margin">
                    <div class="col-md-6">
                        @foreach($child_requests as $request_key => $child_request)
                            <div class="ride-container">
                                <div class="loading">
                                    <p>Loading...</p>
                                </div>
                                <h5 class="page-title ride_status"></h5>
                                <div class="status">
                                    <h6>@lang('user.status')</h6>
                                    <p class="user-status finding-driver">@lang('user.ride.finding_driver')</p>
                                    <p class="user-status accepted-ride">@lang('user.ride.accepted_ride')</p>
                                    <p class="user-status arrived-ride">@lang('user.ride.arrived_ride')</p>
                                    <p class="user-status onride">@lang('user.ride.onride')</p>
                                    <p class="user-status dropped-ride">@lang('user.ride.dropped_ride')</p>
                                    <i class="fa fa-angle-down"></i>
                                    <i class="fa fa-angle-up"></i>
                                </div>
                                <form class="submit-form cancel-form" action="{{url('/admin/adminrequest/cancel/ride')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="request_id" value="{{$child_request->id}}"/>
                                    <div class="modal fade" id="cancel-reason-{{$child_request->id}}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">@lang('user.ride.cancel_request')</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <textarea class="form-control" name="cancel_reason" placeholder="@lang('user.ride.cancel_reason')" row="5"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="full-primary-btn fare-btn">@lang('user.ride.cancel_request')</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="full-primary-btn modal-btn" data-toggle="modal" data-target="#cancel-reason-{{$child_request->id}}">@lang('user.ride.cancel_request')</button>
                                    <button type="submit" class="full-primary-btn fare-btn submit-btn">@lang('user.ride.cancel_request')</button>
                                </form>
                                <div class="ride-details">
                                    <div class="driver-details">
                                        <h5><strong>@lang('user.ride.ride_details')</strong></h5>
                                        <dl class="dl-horizontal left-right">
                                            <dt>@lang('user.booking_id')</dt>
                                            <dd>{{$child_request->booking_id}}</dd>
                                            <dt>@lang('user.service_type')</dt>
                                            <dd>{{$child_request->service_type->name}}</dd>
                                            <dt>@lang('user.driver_name')</dt>
                                            <dd class="driver-name"></dd>
                                            <dt>@lang('user.service_number')</dt>
                                            <dd class="service-number"></dd>
                                            <dt>@lang('user.service_model')</dt>
                                            <dd class="service-model"></dd>
                                            <dt>@lang('user.driver_rating')</dt>
                                            <dd>
                                                <div class="rating-outer">
                                                    <input type="hidden" value="" name="rating" class="rating"/>
                                                </div>
                                            </dd>
                                            <dt>@lang('user.payment_mode')</dt>
                                            <dd>{{$child_request->payment_mode}}</dd>
                                            <dt>@lang('user.otp')</dt>
                                            <dd>{{$child_request->otp}}</dd>
                                        </dl>
                                    </div>
                                    <div class="invoice-details">
                                        <h5><strong>@lang('user.ride.invoice')</strong></h5>
                                        <dl class="dl-horizontal left-right">
                                            <dt>@lang('user.ride.distance_travelled')</dt>
                                            <dd><span class="distance"></span> {{Setting::get('distance')}}</dd>
                                            <dt>@lang('user.ride.base_price')</dt>
                                            <dd><span class="currency"></span> <span class="payment-fixed"></span></dd>
                                            @if($child_request->service_type->calculator == 'MIN')
                                                <dt>@lang('user.ride.minutes_price')</dt>
                                                <dd><span class="currency"></span> <span class="payment-minute"></span></dd>
                                            @endif
                                            @if($child_request->service_type->calculator == 'HOUR')
                                                <dt>@lang('user.ride.hours_price')</dt>
                                                <dd><span class="currency"></span> <span class="payment-hour"></span></dd>
                                            @endif
                                            @if($child_request->service_type->calculator == 'DISTANCE')
                                                <dt>@lang('user.ride.distance_price')</dt>
                                                <dd><span class="currency"></span> <span class="payment-distance"></span></dd>
                                            @endif
                                            @if($child_request->service_type->calculator == 'DISTANCEMIN')
                                                <dt>@lang('user.ride.minutes_price')</dt>
                                                <dd><span class="currency"></span> <span class="payment-minute"></span></dd>
                                                <dt>@lang('user.ride.distance_price')</dt>
                                                <dd><span class="currency"></span> <span class="payment-distance"></span></dd>
                                            @endif
                                            @if($child_request->service_type->calculator == 'DISTANCEHOUR')
                                                <dt>@lang('user.ride.hours_price')</dt>
                                                <dd><span class="currency"></span> <span class="payment-hour"></span></dd>
                                                <dt>@lang('user.ride.distance_price')</dt>
                                                <dd><span class="currency"></span> <span class="payment-distance"></span></dd>
                                            @endif
                                            <dt>@lang('user.ride.tax_price')</dt>
                                            <dd><span class="currency"></span> <span class="payment-tax"></span></dd>
                                            <span class="use-wallet">
                                                <dt>@lang('user.ride.detection_wallet')</dt>
                                                <dd><span class="currency"></span> <span class="payment-wallet"></span></dd>
                                            </span>
                                            <span class="discount">
                                                <dt>@lang('user.ride.promotion_applied')</dt>
                                                <dd><span class="currency"></span> <span class="payment-discount"></span></dd>
                                            </span>
                                            <span class="tips">
                                                <dt>@lang('user.ride.tips')</dt>
                                                <dd><span class="currency"></span> <span class="payment-tips"></span></dd>
                                            </span>

                                            <dt class="big">@lang('user.ride.total')</dt>
                                            <dd><span class="currency"></span> <span data-total="" class="payment-total"></span></dd>
                                            <dt class="big">@lang('user.ride.amount_paid')</dt>
                                            <dd class="big"><span class="currency"></span> <span data-payable="" class="payment-payable"></span></dd>

                                            <form class="submit-form payment-form" method="POST" action="{{url('/admin/adminrequest/payment')}}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="request_id" value="{{$child_request->id}}"/>
                                                <dt>@lang('user.ride.tips')</dt>
                                                <dd><span class="currency"></span><input type="number" min="0" name="tips" id="tips" onChange="handletipsChange({{$child_request->id}})"/></dd>
                                                <button type="submit" class="full-primary-btn fare-btn">CONTINUE TO PAY - <span class="currency"></span> <span data-payable="" class="payment-payable"></span></button>
                                            </form>
                                        </dl>
                                    </div>
                                </div>

                                <form class="submit-form rate-form" method="POST" action="{{url('/admin/adminrequest/rate')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="request_id" value="{{$child_request->id}}"/>
                                    <div class="rate-review">
                                        <label>@lang('user.ride.rating')</label>
                                        <div class="rating-outer">
                                            <input type="hidden" value="1" name="rating" class="rating"/>
                                        </div>
                                        <label>@lang('user.ride.comment')</label>
                                        <textarea class="form-control" name="comment" placeholder="Write Comment"></textarea>
                                    </div>
                                    <button type="submit" class="full-primary-btn fare-btn">SUBMIT</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <dl class="dl-horizontal left-right">
                            <dt>@lang('user.request_id')</dt>
                            <dd>{{$request->id}}</dd>
                            <dt>@lang('user.time')</dt>
                            <dd>{{date('d-m-Y H:i A',strtotime($request->assigned_at))}}</dd>
                        </dl> 
                        <div class="user-request-map">
                            <div class="from-to row no-margin">
                                <div class="from">
                                    <h5>FROM</h5>
                                    <p>{{$request->s_address}}</p>
                                </div>
                                <div class="to">
                                    <h5>TO</h5>
                                    <p>{{$request->d_address}}</p>
                                </div>
                                <div class="type">
                                    <h5>TYPE</h5>
                                    <p>{{$request->service_type->name}}</p>
                                </div>
                            </div>
                            <?php
                                $map_icon = asset('asset/img/marker-start.png');
                                $static_map = "https://maps.googleapis.com/maps/api/staticmap?autoscale=1&size=600x450&maptype=roadmap&format=png&visual_refresh=true&markers=icon:".$map_icon."%7C".$request->s_latitude.",".$request->s_longitude."&markers=icon:".$map_icon."%7C".$request->d_latitude.",".$request->d_longitude."&path=color:0x191919|weight:8|enc:".$request->route_key."&key=".Setting::get('map_key');?>

                                <div class="map-image">
                                    <img src="{{$static_map}}">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style type="text/css">
        .no-margin{
            margin:0!important;
        }
        dl.left-right dt {
            text-align: left;
            color: #666;
        }
        .dl-horizontal dt {
            float: left;
            width: 160px;
            overflow: hidden;
            clear: left;
            text-align: right;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        dl.left-right dd {
            text-align: right;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .dl-horizontal dd {
            margin-left: 180px;
        }
        .dl-horizontal dd::before, .dl-horizontal dd::after {
            display: table;
            content: " ";
        }
        .dl-horizontal dd::after {
            clear: both;
        }
        .user-request-map{
            background-color: #f9f9f9;
            border:1px solid #eee;
        }
        .user-request-map .from-to .from {
            border-bottom: 1px solid #eee;
            padding: 15px;
            padding-bottom: 5px;
        }
        .user-request-map .from-to h5 {
            font-size: 10px;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 5px;
        }
        .user-request-map .from-to .to {
            padding: 15px;
            padding-bottom: 5px;
        }
        .user-request-map .from-to p {
            font-size: 12px;
            margin-bottom: 0;
        }
        .user-request-map .map-responsive-trip{
            overflow:hidden;
            padding-bottom:70.25%;
            position:relative;
            height:0;
        }
        .user-request-map .map-responsive-trip iframe{
            left:0;
            top:0;
            height:100%;
            width:100%;
            position:absolute;
        }
        .user-request-map .type {
            padding: 15px;
            border-top: 1px solid #eee;
        }
        .user-request-map .type h5{
            margin: 0;
            font-size: 13px;
            color: #666;
        }
        .page-title {
            margin: 0;
            margin-bottom: 0px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .ride-container {
            padding: 10px;
            border: 1px solid #eee;
            margin-bottom: 15px;
        }
        .ride-details, .status, .status .user-status, .invoice-details, .submit-form {
            display: none;
        }
        .full-primary-btn {
            border:0;
            margin:0;
            padding: 0;
            padding: 10px;
            padding-top: 14px;
            background-color: #37b38b;
            color: #fff;
            text-align: left;
            display: block;
            width: 100%;
            margin-top: 20px;
            font-weight: 600;
            text-align: center;
            display: none;
        }
        .rate-form .full-primary-btn {
            display: block;
        }
        .full-primary-btn:hover,.full-primary-bt:focus,.full-primary-bt:active{
            color: #fff;
        }
        .status {
            position: relative;
            background-color:  #37b38b;
            color: #fff;
            padding: 15px 15px 10px;
            margin-bottom: 15px;
        }
        .status h6 {
            margin: 0;
            margin-bottom: 0px;
            margin-bottom: 5px;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.5px;
            color: #fff;
        }
        .status p {
            margin-bottom: 0;
            color: #fff;
            font-size: 12px;
        }
        .status .fa {
            position: absolute;
            cursor: pointer;
            right: 20px;
            top: 15px;
        }
        .status.active .fa {
            top: 30px;
        }
        .status .fa.fa-angle-up {
            display: none;
        }
        .modal-content {
            border-radius: 0;
        }
        .modal-header {
            padding: 15px 15px 10px;
        }
        .modal-title {
            font-size: 13px;
            font-weight: 600;
            margin-top: 2px;
        }
        #tips {
            width:50px;
            text-align:right;
        }
        @media screen and (max-width: 991px) {
            .fare-btn {
                margin-bottom: 30px;
            }
            .status {
                margin-top: 20px;
            }
        }
    </style>
@endsection

@section('scripts')
    <script type="text/javascript">
        setInterval(checkRequest, 5000);

        function checkRequest() {
            $.ajax({
                url: "/admin/adminrequest/{{$request->id}}/status",
                type: "GET"})
                .done(function(response) {
                    switchState(response);
                });
        }

        var fixval = 2;
        function switchState(data) {
            if (data == undefined){
                window.location.reload();
            } else {
                var currency_str = data.currency;
                if (typeof data.child_data != "undefined") {
                    var childs_data = data.child_data;
                    var ride_containers = $(".ride-container");
                    for (var child_indx = 0;child_indx < childs_data.length;child_indx++) {
                        var child_data = childs_data[child_indx];
                        $(ride_containers[child_indx]).find(".loading").hide();
                        $(ride_containers[child_indx]).find(".user-status").each(function() {
                            $(this).hide();
                        });
                        $(ride_containers[child_indx]).find(".status").hide();
                        $(ride_containers[child_indx]).find(".modal-btn").hide();
                        $(ride_containers[child_indx]).find(".submit-btn").hide();
                        $(ride_containers[child_indx]).find(".ride-details .driver-details").hide();
                        $(ride_containers[child_indx]).find(".ride-details .invoice-details").hide();
                        $(ride_containers[child_indx]).find(".ride-details .invoice-details .use-wallet").hide();
                        $(ride_containers[child_indx]).find(".ride-details .invoice-details .discount").hide();
                        $(ride_containers[child_indx]).find(".ride-details .invoice-details .tips").hide();
                        $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-form").hide();
                        $(ride_containers[child_indx]).find(".ride-details .invoice-details .rate-form").hide();
                        $(ride_containers[child_indx]).find(".status").removeClass("active");
                        if(child_data.status == 'SEARCHING'){
                            $(ride_containers[child_indx]).find(".ride_status").text("@lang('user.ride.finding_driver')");
                            $(ride_containers[child_indx]).find(".cancel-form").show();
                            $(ride_containers[child_indx]).find(".cancel-form .submit-btn").show();
                            $(ride_containers[child_indx]).find(".user-status.finding-driver").show();
                        } else if(child_data.status == 'STARTED') {
                            var provider_name = child_data.provider.first_name;
                            $(ride_containers[child_indx]).find(".ride_status").text(provider_name+" @lang('user.ride.accepted_ride')");
                            $(ride_containers[child_indx]).find(".cancel-form").show();
                            $(ride_containers[child_indx]).find(".cancel-form .modal-btn").show();
                            $(ride_containers[child_indx]).find(".user-status.accepted-ride").show();
                        } else if(child_data.status == 'ARRIVED') {
                            var provider_name = child_data.provider.first_name;
                            $(ride_containers[child_indx]).find(".ride_status").text(provider_name+" @lang('user.ride.arrived_ride')");
                            $(ride_containers[child_indx]).find(".cancel-form").show();
                            $(ride_containers[child_indx]).find(".cancel-form .modal-btn").show();
                            $(ride_containers[child_indx]).find(".user-status.arrived-ride").show();
                        } else if(child_data.status == 'PICKEDUP') {
                            $(ride_containers[child_indx]).find(".ride_status").text("@lang('user.ride.onride')");
                            $(ride_containers[child_indx]).find(".user-status.onride").show();
                        } else if((child_data.status == 'DROPPED' || child_data.status == 'COMPLETED') && child_data.payment_mode == 'CASH' && child_data.paid == 0){
                            $(ride_containers[child_indx]).find(".ride_status").text("@lang('user.ride.waiting_payment')");
                            $(ride_containers[child_indx]).find(".user-status.dropped-ride").show();
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .distance").text(child_data.distance);
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .currency").text(currency_str);
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-fixed").text(child_data.payment.fixed.toFixed(fixval));
                            if(child_data.service_type.calculator == 'MIN') {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-minute").text(child_data.payment.minute.toFixed(fixval));
                            }
                            if(child_data.service_type.calculator == 'HOUR') {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-hour").text(child_data.payment.hour.toFixed(fixval));
                            }
                            if(child_data.service_type.calculator == 'DISTANCE') {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-distance").text(child_data.payment.distance.toFixed(fixval));
                            }
                            if(child_data.service_type.calculator == 'DISTANCEMIN') {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-minute").text(child_data.payment.minute.toFixed(fixval));
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-distance").text(child_data.payment.distance.toFixed(fixval));
                            }
                            if(child_data.service_type.calculator == 'DISTANCEHOUR') {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-hour").text(child_data.payment.hour.toFixed(fixval));
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-distance").text(child_data.payment.distance.toFixed(fixval));
                            }
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-tax").text(child_data.payment.tax.toFixed(fixval));
                            if(child_data.use_wallet) {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-wallet").text(child_data.payment.wallet.toFixed(fixval));
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .use-wallet").show();
                            }
                            if(child_data.payment.discount) {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-discount").text(child_data.payment.discount.toFixed(fixval));
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .discount").show();
                            }
                            if(child_data.payment.tips) {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-tips").text(child_data.payment.tips.toFixed(fixval));
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .tips").show();
                            }
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-total").text(child_data.payment.total.toFixed(fixval));
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-payable").text(child_data.payment.payable.toFixed(fixval));
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details").show();
                        } else if((child_data.status == 'DROPPED' || child_data.status == 'COMPLETED') && child_data.payment_mode == 'CARD' && child_data.paid == 0){
                            $(ride_containers[child_indx]).find(".ride_status").text("@lang('user.ride.waiting_payment')");
                            $(ride_containers[child_indx]).find(".user-status.dropped-ride").show();
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .distance").text(child_data.distance);
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .currency").text(currency_str);
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-fixed").text(child_data.payment.fixed.toFixed(fixval));
                            if(child_data.service_type.calculator == 'MIN') {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-minute").text(child_data.payment.minute.toFixed(fixval));
                            }
                            if(child_data.service_type.calculator == 'HOUR') {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-hour").text(child_data.payment.hour.toFixed(fixval));
                            }
                            if(child_data.service_type.calculator == 'DISTANCE') {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-distance").text(child_data.payment.distance.toFixed(fixval));
                            }
                            if(child_data.service_type.calculator == 'DISTANCEMIN') {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-minute").text(child_data.payment.minute.toFixed(fixval));
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-distance").text(child_data.payment.distance.toFixed(fixval));
                            }
                            if(child_data.service_type.calculator == 'DISTANCEHOUR') {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-hour").text(child_data.payment.hour.toFixed(fixval));
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-distance").text(child_data.payment.distance.toFixed(fixval));
                            }
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-tax").text(child_data.payment.tax.toFixed(fixval));
                            if(child_data.use_wallet) {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-wallet").text(child_data.payment.wallet.toFixed(fixval));
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .use-wallet").show();
                            }
                            if(child_data.payment.discount) {
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-discount").text(child_data.payment.discount.toFixed(fixval));
                                $(ride_containers[child_indx]).find(".ride-details .invoice-details .discount").show();
                            }
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-form").show();
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-total").data("total", child_data.payment.total.toFixed(fixval));
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-total").text(child_data.payment.total.toFixed(fixval));
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-payable").data("payable", child_data.payment.payable.toFixed(fixval));
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details .payment-payable").text(child_data.payment.payable.toFixed(fixval));
                            $(ride_containers[child_indx]).find(".ride-details .invoice-details").show();
                        } else if(child_data.status == 'COMPLETED') {
                            if (!child_data.user_rated) {
                                var provider_name = child_data.provider.first_name;
                                $(ride_containers[child_indx]).find(".ride_status").text("@lang('user.ride.rate_and_review') " + provider_name);
                                $(ride_containers[child_indx]).find(".rate-form").show();
                            } else {
                                $(ride_containers[child_indx]).find(".ride_status").text("@lang('user.ride.completed_request')");
                            }
                        } else if(child_data.status == 'CANCELLED') {
                            $(ride_containers[child_indx]).find(".ride_status").text("@lang('user.ride.canceled_request')");
                        }
                        if(child_data.status == 'STARTED' || child_data.status == 'ARRIVED' || child_data.status == 'PICKEDUP' || child_data.status == 'DROPPED') {
                            $(ride_containers[child_indx]).find(".driver-details .driver-name").text(child_data.provider.first_name + " " + child_data.provider.last_name);
                            $(ride_containers[child_indx]).find(".driver-details .service-number").text(child_data.provider_service.service_number);
                            $(ride_containers[child_indx]).find(".driver-details .service-model").text(child_data.provider_service.service_model);
                            $(ride_containers[child_indx]).find(".ride-details .driver-details").show();
                            $(ride_containers[child_indx]).find(".status").addClass("active");
                            $(ride_containers[child_indx]).find(".status").show();
                        }
//                        setTimeout(function(){
//                            $('.rating').rating();
//                        }, 400);
                    }
                }
            }
        }

        function handletipsChange(ride_id) {
            var ride_containers = $(".ride-container");
            var payable_el = $(ride_containers[ride_id]).find(".ride-details .invoice-details .payment-payable");
            var total_el = $(ride_containers[ride_id]).find(".ride-details .invoice-details .payment-total");
            var payable_val = parseFloat(payable_el.data("payable")) + parseFloat($(this).val()) || payable_el.data("payable");
            var total_val = parseFloat(payable_el.data("total")) + parseFloat($(this).val()) || payable_el.data("total");
            payable_el.text(payable_val.toFixed(fixval));
            total_el.text(total_val.toFixed(fixval));
        }

        window.addEventListener('load', function () {
            $(".status .fa-angle-down").click(function() {
                $(this).parent().find(".fa-angle-up").show();
                $(this).hide();
                $(this).parent().parent().find(".ride-details").show();
            });

            $(".status .fa-angle-up").click(function() {
                $(this).parent().find(".fa-angle-down").show();
                $(this).hide();
                $(this).parent().parent().find(".ride-details").hide();
            });
        }, false);
	</script>
    <style type="text/css">
        #tips{
            width:50px;
            text-align:right;
        }
    </style>
@endsection