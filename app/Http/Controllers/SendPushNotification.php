<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Provider;
use App\ProviderDevice;
use Exception;
use Log;
use Setting;
use App;

class SendPushNotification extends Controller
{
	/**
     * New Ride Accepted by a Driver.
     *
     * @return void
     */
    public function RideAccepted($request){
        if ($request->user_id) {
            $user = User::where('id',$request->user_id)->first();
            $language = $user->language;
            App::setLocale($language);
            return $this->sendPushToUser($request->user_id, trans('api.push.request_accepted'));
        }
    }
    
    /**
     * Driver Arrived at your location.
     *
     * @return void
     */
    public function user_schedule($user){
        if ($user) {
            $user = User::where('id',$user)->first();
            $language = $user->language;
            App::setLocale($language);
            return $this->sendPushToUser($user, trans('api.push.schedule_start'));
        }
    }

    /**
     * New Incoming request
     *
     * @return void
     */
    public function provider_schedule($provider){
        $provider = Provider::where('id',$provider)->with('profile')->first();
        if($provider->profile){
            $language = $provider->profile->language;
            App::setLocale($language);
        }

        return $this->sendPushToProvider($provider, trans('api.push.schedule_start'));
    }

    /**
     * New Ride Accepted by a Driver.
     *
     * @return void
     */
    public function UserCancellRide($request){
        if(!empty($request->provider_id)){

            $provider = Provider::where('id',$request->provider_id)->with('profile')->first();

            if($provider->profile){
                $language = $provider->profile->language;
                App::setLocale($language);
            }

            return $this->sendPushToProvider($request->provider_id, trans('api.push.user_cancelled'));
        }
        
        return true;    
    }

    /**
     * New Ride Accepted by a Driver.
     *
     * @return void
     */
    public function AdminCancellRide($request){
        if(!empty($request->provider_id)){

            $provider = Provider::where('id',$request->provider_id)->with('profile')->first();

            if($provider->profile){
                $language = $provider->profile->language;
                App::setLocale($language);
            }

            return $this->sendPushToProvider($request->provider_id, trans('api.push.admin_cancelled'));
        }

        return true;
    }

    /**
     * New Ride Accepted by a Driver.
     *
     * @return void
     */
    public function ProviderCancellRide($request){
        if ($request->user_id) {
            $user = User::where('id',$request->user_id)->first();
            $language = $user->language;
            App::setLocale($language);

            return $this->sendPushToUser($request->user_id, trans('api.push.provider_cancelled'));
        }
    }

    /**
     * Driver Arrived at your location.
     *
     * @return void
     */
    public function Arrived($request){
        if ($request->user_id) {
            $user = User::where('id',$request->user_id)->first();
            $language = $user->language;
            App::setLocale($language);

            return $this->sendPushToUser($request->user_id, trans('api.push.arrived'));
        }
    }

    /**
     * Driver Picked You  in your location.
     *
     * @return void
     */
    public function Pickedup($request){
        if ($request->user_id) {
            $user = User::where('id',$request->user_id)->first();
            $language = $user->language;
            App::setLocale($language);

            return $this->sendPushToUser($request->user_id, trans('api.push.pickedup'));
        }
    }

    /**
     * Driver Reached  destination
     *
     * @return void
     */
    public function Dropped($request){
        if ($request->user_id) {
            $user = User::where('id',$request->user_id)->first();
            $language = $user->language;
            App::setLocale($language);

            return $this->sendPushToUser($request->user_id, trans('api.push.dropped').Setting::get('currency').$request->payment->total.' by '.$request->payment_mode);
        }
    }

    /**
     * Your Ride Completed
     *
     * @return void
     */
    public function Complete($request){
        if ($request->user_id) {
            $user = User::where('id',$request->user_id)->first();
            $language = $user->language;
            App::setLocale($language);
    
            return $this->sendPushToUser($request->user_id, trans('api.push.complete'));
        }
    }    
     
    /**
     * Rating After Successful Ride
     *
     * @return void
     */
    public function Rate($request){
        if ($request->user_id) {
            $user = User::where('id',$request->user_id)->first();
            $language = $user->language;
            App::setLocale($language);

            return $this->sendPushToUser($request->user_id, trans('api.push.rate'));
        }
    }

    /**
     * Money added to user wallet.
     *
     * @return void
     */
    public function ProviderNotAvailable($user_id){
        if ($user_id) {
            $user = User::where('id',$user_id)->first();
            $language = $user->language;
            App::setLocale($language);

            return $this->sendPushToUser($user_id,trans('api.push.provider_not_available'));
        }
    }

    /**
     * New Incoming request
     *
     * @return void
     */
    public function IncomingRequest($provider){

        $provider = Provider::where('id',$provider)->with('profile')->first();
        if($provider->profile){
            $language = $provider->profile->language;
            App::setLocale($language);
        }

        return $this->sendPushToProvider($provider->id, trans('api.push.incoming_request'));

    }
    
    /**
     * New Incoming request
     *
     * @return void
     */
    public function IncomingAdminRequest($provider) {
        $provider = Provider::where('id',$provider)->with('profile')->first();
        if($provider->profile){
            $language = $provider->profile->language;
            App::setLocale($language);
        }

        return $this->sendPushToProvider($provider->id, trans('api.push.incoming_admin_request'));
    }

    /**
     * Driver Documents verfied.
     *
     * @return void
     */
    public function DocumentsVerfied($provider_id){

        $provider = Provider::where('id',$provider_id)->with('profile')->first();
        if($provider->profile){
            $language = $provider->profile->language;
            App::setLocale($language);
        }

        return $this->sendPushToProvider($provider_id, trans('api.push.document_verfied'));
    }

    /**
     * Driver ServiceType Stored.
     *
     * @return void
     */
    public function ServiceTypeAdded($provider_id){

        $provider = Provider::where('id',$provider_id)->with('profile')->first();
        if($provider->profile){
            $language = $provider->profile->language;
            App::setLocale($language);
        }

        return $this->sendPushToProvider($provider_id, trans('api.push.servicetype_added'));
    }

    /**
     * Driver ServiceType Stored.
     *
     * @return void
     */
    public function ServiceTypeUpdated($provider_id){

        $provider = Provider::where('id',$provider_id)->with('profile')->first();
        if($provider->profile){
            $language = $provider->profile->language;
            App::setLocale($language);
        }

        return $this->sendPushToProvider($provider_id, trans('api.push.servicetype_updated'));
    }

    /**
     * Money added to user wallet.
     *
     * @return void
     */
    public function WalletMoney($user_id, $money){
        if ($user_id) {
            $user = User::where('id',$user_id)->first();
            $language = $user->language;
            App::setLocale($language);

            return $this->sendPushToUser($user_id, $money.' '.trans('api.push.added_money_to_wallet'));
        }
    }

    /**
     * Money charged from user wallet.
     *
     * @return void
     */
    public function ChargedWalletMoney($user_id, $money){
        if ($user_id) {
            $user = User::where('id',$user_id)->first();
            $language = $user->language;
            App::setLocale($language);

            return $this->sendPushToUser($user_id, $money.' '.trans('api.push.charged_from_wallet'));
        }
    }

    private function _test_IOS_sendPushToUser() {        
        // PUSH NOTIFICATION SEND
        $registration_ids = array($user->device_token);
        $url = 'https://fcm.googleapis.com/fcm/send';
        if ($user->device_type == 'ios') {
            $fields = array(
                'registration_ids' => $registration_ids,
                'data' => $push_message,
                'notification' => array(
                    "title" => 'AppName'
                    , "body" => $push_message,
                    "sound" => "Default")
            );
        }
        $headers = array(
            'Authorization:key=AAAAazKGS_o:APA91bG7rHhtsA2Df-AqNym3EKktfJyMg4dGDmhEPAaZAhZQMFH2PSbvrQfG9OCyo4okPwLaIuOcH9p3T6xLRThVQVP6qI4j17Zl-r9G0E27jIyxnLY8lOKvd3osTr_tx1NWZWoaygbM',
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // add
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        // curl_exec($ch);
        $result = curl_exec($ch);
        // print_r(json_decode( $result ));
        if ($result === FALSE) {
            die('Oops! FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
    }

    public function sendIOSPushNotification($token, $push_message) {
        $url = "https://fcm.googleapis.com/fcm/send";
        $arrayToSend = array(
            'registration_ids' => [$token],
            'data' => ['title' => env('APP_NAME'), 'description' => $push_message, 'body' => $push_message],
            'notification' => array(
                "title" => env('APP_NAME'),
                "body" => $push_message,
                "sound" => "Default")
        );
        $json = json_encode($arrayToSend);
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key='. env('IOS_PUSH_KEY');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        if ($response === FALSE) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $response;
    }

    /**
     * Sending Push to a user Device.
     *
     * @return void
     */
    public function sendPushToUser($user_id, $push_message){
    	try{

	    	$user = User::findOrFail($user_id);

            if($user->device_token != "") {
    	    	if($user->device_type == 'ios'){

                    return $this->sendIOSPushNotification($user->device_token, $push_message);

    	    	}elseif($user->device_type == 'android'){
    	    		
    	    		return \PushNotification::app('AndroidUser')
                        ->to($user->device_token)
                        ->send($push_message);
                    
    	    	}
            }

    	} catch(Exception $e){
    		return $e;
    	}

    }

    /**
     * Sending Push to a user Device.
     *
     * @return void
     */
    public function sendPushToProvider($provider_id, $push_message){
    	try{

            $provider = ProviderDevice::where('provider_id',$provider_id)->with('provider')->first();
            if($provider->token != ""){

            	if($provider->type == 'ios'){

            		// return \PushNotification::app('IOSProvider')
        	        //     ->to($provider->token)
                    //     ->send($push_message);
                    return $this->sendIOSPushNotification($provider->token, $push_message);

            	}elseif($provider->type == 'android'){
            		return \PushNotification::app('AndroidProvider')
        	            ->to($provider->token)
                        ->send($push_message);
            	}
            }

    	} catch(Exception $e){
    		return $e;
    	}

    }

}
