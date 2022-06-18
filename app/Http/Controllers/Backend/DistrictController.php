<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\District;
use App\City;
use App\Setting;
use Auth;
use DB;

class DistrictController extends Controller
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

        $datas = District::leftJoin('city','District.city_id', '=', 'city.city_id')
                                ->orderBy('District.district_name','asc')
                                ->get();

        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.District.index',compact('datas','config','setting'));
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

        $cit = city::get();
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.District.create',compact('cit','config','setting'));
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
            'city'          => 'required',
            'district_name'     => 'required|string|',
        ],[

            'city.required'       => 'Please Choose city Name',
            'district_name.required'  => 'Please Enter District Name',
        ]);

        $count    = District::where('district_name',$request->input('district_name'))
                        ->count();

        if($count>0){
                return redirect()->to('admin/District')->with('error','District Name Already Exists');
            }

        District::create([
            'city_id'       => $request->get('city'),
            'district_name'         => $request->get('district_name'),
        ]);

        return redirect()->to('admin/district')->with('success','Add District Success');
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
    public function edit($district_id)
    {
        if(Auth::user()->status == 'staff') {
            return redirect()->to('/admin/dashboard/')->with('error','access is forbidden');
        }

        $data = District::leftJoin('city','district.city_id', '=', 'city.city_id')->findOrFail($district_id);
        $cit = city::get();
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.District.edit',compact('data','cit','config','setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $district_id)
    {
        $this->validate($request, [
            'city'          => 'required|string|',
            'district_name'     => 'required|string|',
        ],[

            'city.required'       => 'Please Choose city Name',
            'district_name.required'  => 'Please Enter District Name',
        ]);

        $data = District::findOrFail($district_id);

        $count    = District::where('district_name',$request->input('district_name'))
                        ->count();

        if($count>0){
                return redirect()->to('admin/district')->with('error','District Name Already Exists');
            }

        $data->city_id  = $request->input('city');
        $data->district_name    = $request->input('district_name');

        $data->update();

        return redirect()->to('admin/district')->with('success','Update District Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($district_id)
    {
        $hapus              = District::findOrFail($district_id);
        $hapus->delete();
    }

    public function getDistrict(Request $req)
    {
      $cit = District::where('city_id', '=', $req->city_id)->get();

      echo json_encode($cit->all());
    }
}
