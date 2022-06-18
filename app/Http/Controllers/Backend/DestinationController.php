<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Destination;
use App\Type;
use App\District;
use App\City;
use App\Setting;
use DB;

class DestinationController extends Controller
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
        $datas = Destination::leftJoin('type','type.type_id', '=', 'destination.type_id')
                                ->leftJoin('users','users.users_id', '=', 'destination.users_id')
                                ->leftJoin('city','city.city_id', '=', 'destination.city_id')
                                ->leftJoin('district','district.district_id', '=', 'destination.district_id')
                                ->orderBy('destination.dest_name','asc')
                                ->get();

        $setting = Setting::get();
        $config  = DB::table('setting')
                    ->get()[0];
        
        return view('Backend.Destination.index',compact('datas','setting','config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type::get();
        $city = City::get();
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.Destination.create',compact('type','city','config','setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count    = Destination::where('dest_name',$request->input('dest_name'))
                        ->count();

        if($count>0){
                return redirect()->to('admin/destination')->with('error','Destination Already Exists');
            }

            $this->validate($request, [
                'pict'        => 'required',
                'dest_name'   => 'required',
                'latitude'    => 'required|string|regex:/(^([0-9\.\,\-\ ]+)(\d+)?$)/u',
                'longitude'   => 'required|string|regex:/(^([0-9\.\,\-\ ]+)(\d+)?$)/u',
                'type'        => 'required',
                'city'        => 'required',
                'district'        => 'required',
                'desc'        => 'required',
                'address'     => 'required',
            ],[
                
                'pict.required'         => 'Please enter Picture Banner',
                'dest_name.required'    => 'Please enter Destination Name',
                'type.required'         => 'Please enter Category Destination',
                'city.required'         => 'Please enter City',
                'district.required'         => 'Please enter District',
                'desc.required'         => 'Please enter Description Destination',
                'latitude.required'        => 'Harap isi field latitude',
                'longitude.required'       => 'Harap isi field longitude',
                'address.required'      => 'Please enter Address',
            ]);

        if ($request->file('pict')) {
            $file             = $request->file('pict');
            $inisial          = $request->input('dest_name');
            $acak             = $file->getClientOriginalExtension();
            $filename         = $inisial.' - pict '.'.'.$acak;
            $request          -> file('pict')->move("images/destination", $filename);
            $pict             = $filename;
            } else {
                $pict             = NULL;
            }

        Destination::create([
            'pict'        => $pict,
            'users_id'    => $request->get('users_id'),
            'dest_name'   => $request->get('dest_name'),
            'type_id'     => $request->get('type'),
            'city_id'     => $request->get('city'),
            'district_id' => $request->get('district'),
            'desc'        => $request->get('desc'),
            'longitude'   => $request->get('longitude'),
            'latitude'    => $request->get('latitude'),
            'address'     => $request->get('address'),
        ]);

        return redirect()->to('admin/destination')->with('success','Add Destination Success');
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
    public function edit($dest_id)
    {
        $data = Destination::leftJoin('type','type.type_id', '=', 'destination.type_id')
                                ->leftJoin('users','users.users_id', '=', 'destination.users_id')
                                ->leftJoin('city','city.city_id', '=', 'destination.city_id')
                                ->leftJoin('district','district.district_id', '=', 'destination.district_id')
                                ->findOrFail($dest_id);
        $type = Type::get();
        $city = City::get();
        $district = District::get();
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.Destination.edit',compact('data','type','city','district','config','setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dest_id)
    {
        $data = Destination::findOrFail($dest_id);

        // $count    = Destination::where('dest_name',$request->input('dest_name'))
        //     ->count();

        // if($count>0){
        //     return redirect()->to('admin/destination')->with('error','Destination Already Exists');
        // }

        $this->validate($request, [
            'dest_name'   => 'required',
            'type'        => 'required',
            'city'        => 'required',
            'district'        => 'required',
            'desc'        => 'required',
            'latitude'    => 'required|string|regex:/(^([0-9\.\,\-\ ]+)(\d+)?$)/u',
            'longitude'   => 'required|string|regex:/(^([0-9\.\,\-\ ]+)(\d+)?$)/u',
            'address'     => 'required',
        ],[
            
            'dest_name.required'    => 'Please enter Destination Name',
            'type.required'         => 'Please enter Category Destination',
            'city.required'         => 'Please enter City',
            'district.required'         => 'Please enter District',
            'desc.required'         => 'Please enter Description Destination',
            'latitude.required'        => 'Harap isi field latitude',
            'longitude.required'       => 'Harap isi field longitude',
            'address.required'      => 'Please enter Address',
        ]);

        if ($request->file('pict')) 
        {

            $pic_path         = public_path().'/images/destination/'.$data->pict;
            unlink($pic_path);

            $file                 = $request->file('pict');
            $inisial              = $request->input('dest_name');
            $acak                 = $file->getClientOriginalExtension();
            $filename             = $inisial.' - pict '.'.'.$acak;
            $request              -> file('pict')->move("images/destination", $filename);
            $data                 ->pict = $filename;
        }

        $data->dest_name    = $request->input('dest_name');
        $data->type_id      = $request->input('type');
        $data->city_id      = $request->input('city');
        $data->district_id  = $request->input('district');
        $data->desc         = $request->input('desc');
        $data->longitude    = $request->input('longitude');
        $data->latitude     = $request->input('latitude');
        $data->address      = $request->input('address');

        $data->update();

        return redirect()->to('admin/destination')->with('success','Update Destination Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($dest_id)
    {
        $hapus            = Destination::findOrFail($dest_id);
        $pic_path         = public_path().'/images/destination/'.$hapus->pict;
        unlink($pic_path);
        $hapus->delete();
    }

    public function AddGaleri(Request $request){

        if ($request->file('pict')) {
            $file             = $request->file('pict');
            $inisial          = $request->input('dest_name');
            $acak             = $file->getClientOriginalExtension();
            $filename         = $inisial.' - pict '.'.'.$acak;
            $request          -> file('pict')->move("images/destination", $filename);
            $pict             = $filename;
            } else {
                $pict             = NULL;
            }

        
    }
}
