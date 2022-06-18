<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use Auth;
use App\Setting;
use DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if(Auth::user()->status == 'staff') {
            return redirect()->to('/admin/dashboard/')->with('error','access is forbidden');
        }

        $datas = City::orderBy('city_name','asc')->get();
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.City.index',compact('datas','config','setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->status == 'staff') {
            return redirect()->to('/admin/dashboard/')->with('error','access is forbidden');
        }

        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.City.create',compact('config','setting'));
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
            'city_name'     => 'required|string|',
        ],[

            'city_name.required'  => 'Please enter City Name',
        ]);

        $count    = City::where('city_name',$request->input('city_name'))
                        ->count();

        if($count>0){
                return redirect()->to('admin/City')->with('error','City Name Already Exists');
            }

        City::create([
            'city_name'       => $request->get('city_name'),
        ]);

        return redirect()->to('admin/city')->with('success','Add City Success');
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
    public function edit($city_id)
    {
        if(Auth::user()->status == 'staff') {
            return redirect()->to('/admin/dashboard/')->with('error','access is forbidden');
        }
        
        $data = City::findOrFail($city_id);
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.City.edit',compact('data','config','setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $city_id)
    {
        $data = City::findOrFail($city_id);

        $this->validate($request, [
            'city_name'     => 'required|string|',
        ],[

            'city_name.required'  => 'Please enter City Name',
        ]);

        $data->city_name  = $request->input('city_name');

        $data->update();

        return redirect()->to('admin/city')->with('success','Update City Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($city_id)
    {
        $hapus = City::findOrFail($city_id);
        $hapus->delete();
    }
}
