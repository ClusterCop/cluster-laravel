<?php

namespace App\Http\Controllers\Resource;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SendPushNotification;

use DB;
use Exception;
use Setting;

use App\Provider;
use App\ServiceType;
use App\ProviderService;
use App\ProviderDocument;
use App\Helpers\Helper;

class ProviderDocumentResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $provider)
    {
        try {
            $backurl=$request->session()->get('providerpage');
            $Provider = Provider::findOrFail($provider);
            $ProviderService = ProviderService::where('provider_id',$provider)->with('service_type')->get();
            $ServiceTypes = ServiceType::all();
            return view('admin.providers.document.index', compact('Provider', 'ServiceTypes','ProviderService','backurl'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $provider)
    {
        $this->validate($request, [
                'service_type' => 'required|exists:service_types,id',
                'service_number' => 'required',
                'service_model' => 'required',
            ]);

        $ProviderServiceExist = ProviderService::where('service_type_id', $request->service_type)->where('provider_id', $provider)->get();
        if ($ProviderServiceExist->count() == 0) {
            ProviderService::create([
                'provider_id' => $provider,
                'service_type_id' => $request->service_type,
                'status' => 'offline',
                'service_number' => $request->service_number,
                'service_model' => $request->service_model,
            ]);
            (new SendPushNotification)->ServiceTypeAdded($provider);
            return redirect()->route('admin.provider.document.index', $provider)->with('flash_success', trans('admin.provider_msgs.provider_service_add'));
        } else {
            return redirect()
                ->route('admin.provider.document.index', $provider)
                ->with('flash_error', trans('admin.provider_msgs.provider_service_duplicated'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($provider, $id)
    {
        try {
            $Document = ProviderDocument::where('provider_id', $provider)
                ->findOrFail($id);

            return view('admin.providers.document.edit', compact('Document'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $provider, $id)
    {
        try {
            $Document = ProviderDocument::where('provider_id', $provider)
                ->findOrFail($id);
            $Document->update(['status' => 'ACTIVE']);

            return redirect()
                ->route('admin.provider.document.index', $provider)
                ->with('flash_success', trans('admin.provider_msgs.document_approved'));
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('admin.provider.document.index', $provider)
                ->with('flash_error', trans('admin.provider_msgs.document_not_found'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($provider, $id)
    {
        try {

            $Document = ProviderDocument::findOrFail($id);
            $Document->delete();

            return redirect()
                ->route('admin.provider.document.index', $provider)
                ->with('flash_success', trans('admin.provider_msgs.document_delete'));
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('admin.provider.document.index', $provider)
                ->with('flash_error', trans('admin.provider_msgs.document_not_found'));
        }
    }

    /**
     * Delete the service type of the provider.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function service_update(Request $request, $provider)
    {
        try {
            $ProviderService = ProviderService::where('id', $request->service_id)->where('provider_id', $provider)->firstOrFail();
            $ProviderServiceExist = ProviderService::where('id', '!=', $request->service_id)->where('service_type_id', $request->service_type)->where('provider_id', $provider)->get();
            if ($ProviderServiceExist->count() == 0) {
                $ProviderService->update([
                    'service_type_id' => $request->service_type,
                    //'status' => 'offline',
                    'service_number' => $request->service_number,
                    'service_model' => $request->service_model,
                ]);

                (new SendPushNotification)->ServiceTypeUpdated($provider);

                return redirect()
                    ->route('admin.provider.document.index', $provider)
                    ->with('flash_success', trans('admin.provider_msgs.provider_service_update'));
            } else {
                return redirect()
                    ->route('admin.provider.document.index', $provider)
                    ->with('flash_error', trans('admin.provider_msgs.provider_service_duplicated'));
            }
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('admin.provider.document.index', $provider)
                ->with('flash_error', trans('admin.provider_msgs.provider_service_not_found'));
        }
    }

    /**
     * Delete the service type of the provider.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function service_destroy(Request $request, $provider, $id)
    {
        try {

            $ProviderService = ProviderService::where('provider_id', $provider)->firstOrFail();
            $ProviderService->delete();

            return redirect()
                ->route('admin.provider.document.index', $provider)
                ->with('flash_success', trans('admin.provider_msgs.provider_service_delete'));
        } catch (ModelNotFoundException $e) {
            return redirect()
                ->route('admin.provider.document.index', $provider)
                ->with('flash_error', trans('admin.provider_msgs.provider_service_not_found'));
        }
    }
}
