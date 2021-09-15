<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use DB;
use Exception;
use Setting;

use App\Http\Controllers\UserApiController;

use App\Provider;
use App\UserRequests;
use App\ServiceType;
use App\Helpers\Helper;

class AdminRequestResource extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('demo', ['only' => ['destroy']]);
        $this->perpage = Setting::get('per_page', '10');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $requests = UserRequests::AdminRequestHistory()->paginate($this->perpage);
            $pagination=(new Helper)->formatPagination($requests);
            return view('admin.admin-request.index', compact('requests','pagination'));
        }
        catch (Exception $e) {
            return back()->with('flash_error','Something Went Wrong!');
        }
    }

    /**
     * Display a listing of the providers.
     *
     * @return \Illuminate\Http\Response
     */
    public function providers() {
        try{
            $OnlineProviders = Provider::where('latitude', '!=', 0)
                ->where('longitude', '!=', 0)
                ->where('status', '=', 'approved')
                ->with('service')
                ->whereHas('service', function($query) {
                    $query->where('status', 'active' );
                })
                ->with('device')
                ->whereHas('device', function($query) {
                    $query->where('token', '!=', '' );
                })
                ->get();

            $BusyProviders = Provider::where('status', '=', 'onboarding')
                ->with('service')
                ->whereHas('service', function($query) {
                    $query->where('status', 'riding' );
                })
                ->get();

            $OfflineProviders = Provider::where('status', '=', 'approved')
                ->with('service')
                ->whereHas('service', function($query) {
                    $query->where('status', 'offline' );
                })
                ->get();

            return view('admin.admin-request.providers', compact('OnlineProviders','BusyProviders', 'OfflineProviders'));
        }
        catch (Exception $e) {
            return back()->with('flash_error','Something Went Wrong!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = ServiceType::all();
        return view('admin.admin-request.create', compact('services'));
    }

    /**
     * Ride Confirmation.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm_ride(Request $request)
    {
        $UserApi = new UserApiController();
        $fare = $UserApi->estimated_fares($request)->getData();
        $service = (new ServiceResource)->show($request->service_type);
        $cards = (new CardResource)->index();
        $promolist = $UserApi->list_promocode($request);

        return view('admin.admin-request.confirm_ride',compact('request','fare','service','cards','promolist'));
    }
    
    /**
     * Create Ride.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_ride(Request $request)
    {
        $UserApi = new UserApiController();
        return $UserApi->send_admin_request($request);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserRequest  $request_id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $UserApi = new UserApiController();
            $ResponseData = $UserApi->admin_request_status_check($id)->getData();

            if ($ResponseData->data && $ResponseData->child_data) {
                return view('admin.admin-request.show')->with('request', $ResponseData->data[0])->with('child_requests', $ResponseData->child_data);
            }
        } catch (Exception $e) {
            return back()->with('flash_error', trans('admin.something_wrong'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserRequest  $request_id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $UserApi = new UserApiController();
        $ResponseData = $UserApi->admin_request_status_check($id)->getData();
        
        if ($ResponseData->data && $ResponseData->child_data) {
            return view('admin.admin-request.edit_ride')->with('request', $ResponseData->data[0])->with('child_requests', $ResponseData->child_data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserRequest  $request_id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $UserApi = new UserApiController();
        return $UserApi->admin_request_status_check($id);
    }

    /**
     * Cancel the ride
     *
     * @param  \App\UserRequest  $request_id
     * @return \Illuminate\Http\Response
     */
    public function cancel_ride(Request $request)
    {
        $UserApi = new UserApiController();
        return $UserApi->admin_cancel_request($request);
    }

    /**
     * Rating of the ride.
     *
     * @param  \App\UserRequest  $request_id
     * @return \Illuminate\Http\Response
     */
    public function rate(Request $request)
    {
        $UserApi = new UserApiController();
        return $UserApi->admin_rate_provider($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserRequest  $request_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserRequest  $request_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $Request = UserRequests::findOrFail($id);
            $RequestChilds = UserRequests::AdminRequestChilds($Request->id)
                ->get();
            foreach ($RequestChilds as $key => $RequestChild) {
                $RequestChild->delete();
            }
            $Request->delete();
            return back()->with('flash_success', trans('admin.request_delete'));
        } catch (Exception $e) {
            return back()->with('flash_error', trans('admin.something_wrong'));
        }
    }
}
