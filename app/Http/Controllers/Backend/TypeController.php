<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;
use Auth;
use App\Setting;
use DB;

class TypeController extends Controller
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

        $datas = Type::orderBy('type_name','asc')->get();
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.Type.index',compact('datas','config','setting'));
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

        return view('Backend.Type.create',compact('setting','config'));
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
            'icon'          => 'required|',
            'type_name'     => 'required|',
        ],[

            'icon.required'       => 'Please Enter Icon',
            'type_name.required'  => 'Please Enter Type Name',
        ]);

        $count    = Type::where('type_name',$request->input('type_name'))
                        ->count();

        if($count>0){
                return redirect()->to('admin/type')->with('error','Type Name Already Exists');
            }

        if ($request->file('icon')) {
            $file             = $request->file('icon');
            $inisial          = $request->input('type_name');
            $acak             = $file->getClientOriginalExtension();
            $filename         = $inisial.' - icon '.'.'.$acak;
            $request          -> file('icon')->move("images/type", $filename);
            $icon             = $filename;
            } else {
                $icon             = NULL;
            }

        Type::create([
            'icon'       => $icon,
            'type_name'  => $request->get('type_name'),
        ]);

        return redirect()->to('admin/type')->with('success','Add Type Success');
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
    public function edit($type_id)
    {
        if(Auth::user()->status == 'staff') {
            return redirect()->to('/admin/dashboard/')->with('error','access is forbidden');
        }

        $data = Type::findOrFail($type_id);
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.Type.edit',compact('data','config','setting'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type_id)
    {

        $data = Type::findOrFail($type_id);

        
        $this->validate($request, [
            'type_name'     => 'required|',
        ],[

            'type_name.required'  => 'Please Enter Type Name',
        ]);

        $count    = Type::where('type_name',$request->input('type_name'))
                        ->count();

        if($count>0){
                return redirect()->to('admin/type')->with('error','Type Name Already Exists');
            }

        if ($request->file('icon')) 
        {

            $pic_path         = public_path().'/images/type/'.$data->icon;
            unlink($pic_path);

            $file                 = $request->file('icon');
            $inisial              = $request->input('type_name');
            $acak                 = $file->getClientOriginalExtension();
            $filename             = $inisial.' - icon '.'.'.$acak;
            $request              -> file('icon')->move("images/type", $filename);
            $data                 ->icon = $filename;
        }

        $data->type_name    = $request->input('type_name');
        $data->update();

        return redirect()->to('admin/type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type_id)
    {
        $hapus            = Type::findOrFail($type_id);
        $pic_path         = public_path().'/images/type/'.$hapus->icon;
        unlink($pic_path);
        $hapus->delete();
    }
}
