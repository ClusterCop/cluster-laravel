<?php

namespace App\Http\Controllers\Resource;

use App\SpecialRate;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SpecialrateResource extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('demo', ['only' => ['store' ,'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialrates = SpecialRate::orderBy('created_at' , 'desc')->get();
        return view('admin.specialrate.index', compact('specialrates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialrate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'source' => 'required|max:255',
            's_radius' => 'required|numeric',
            'destination' => 'required|max:255',
            'd_radius' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        try{
            SpecialRate::create($request->all());
            return back()->with('flash_success', trans('admin.specialrate_msgs.specialrate_saved'));

        } 

        catch (ModelNotFoundException $e) {
            return back()->with('flash_error', trans('admin.specialrate_msgs.specialrate_not_found'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SpecialRate  $specialrate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return SpecialRate::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SpecialRate  $specialrate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $specialrate = SpecialRate::findOrFail($id);
            return view('admin.specialrate.edit',compact('specialrate'));
        } catch (ModelNotFoundException $e) {
            return $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SpecialRate  $specialrate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'source' => 'required|max:255',
            's_radius' => 'required|numeric',
            'destination' => 'required|max:255',
            'd_radius' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        try {

           $specialrate = SpecialRate::findOrFail($id);

            $specialrate->name = $request->name;
            $specialrate->description = $request->description;
            $specialrate->source = $request->source;
            $specialrate->s_latitude = $request->s_latitude;
            $specialrate->s_longitude = $request->s_longitude;
            $specialrate->s_radius = $request->s_radius;
            $specialrate->destination = $request->destination;
            $specialrate->d_latitude = $request->d_latitude;
            $specialrate->d_longitude = $request->d_longitude;
            $specialrate->d_radius = $request->d_radius;
            $specialrate->price = $request->price;
            $specialrate->status = $request->status;
            $specialrate->save();

            return redirect()->route('admin.specialrate.index')->with('flash_success', trans('admin.specialrate_msgs.specialrate_update'));    
        } 

        catch (ModelNotFoundException $e) {
            return back()->with('flash_error', trans('admin.specialrate_msgs.specialrate_not_found'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SpecialRate  $specialrate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            SpecialRate::find($id)->delete();
            return back()->with('message', trans('admin.specialrate_msgs.specialrate_delete'));
        } 
        catch (ModelNotFoundException $e) {
            return back()->with('flash_error', trans('admin.specialrate_msgs.specialrate_not_found'));
        }
    }
}
