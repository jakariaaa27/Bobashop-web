<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\guide;
use App\Destination;
use Auth;
use App\Setting;
use DB;

class GuideController extends Controller
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

        $datas = Guide::orderBy('name','asc')->get();
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.Guide.index',compact('datas','config','setting'));
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

        $dest = Destination::get();
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.Guide.create',compact('dest','config','setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count    = Guide::where('email',$request->input('email'))
            ->count();

        if($count>0){
            return redirect()->to('admin/guide')->with('error','Email Already Exists');
        }

        $this->validate($request, [
            'photo'     => 'required',
            'name'      => 'required',
            'email'     => 'required',
            'phone'     => 'required',
        ],[

            'photo.required'     => 'Please enter Photo',
            'name.required'      => 'Please enter Name',
            'email.required'     => 'Please enter Email',
            'phone.required'     => 'Please enter Phone',
        ]);

        if ($request->file('photo')) {
            $file             = $request->file('photo');
            $inisial          = $request->input('name');
            $acak             = $file->getClientOriginalExtension();
            $filename         = $inisial.' - guide '.'.'.$acak;
            $request          -> file('photo')->move("images/guide", $filename);
            $photo             = $filename;
            } else {
                $photo             = NULL;
            }

        Guide::create([
            'photo'       => $photo,
            'name'        => $request->get('name'),
            'email'       => $request->get('email'),
            'phone'       => $request->get('phone'),
            'dest_id'     => $request->get('dest'),
        ]);

        return redirect()->to('admin/guide')->with('success','Add Manager Success');
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
    public function edit($guide_id)
    {
        if(Auth::user()->status == 'staff') {
            return redirect()->to('/admin/dashboard/')->with('error','access is forbidden');
        }
        
        $data = Guide::leftJoin('destination','destination.dest_id', '=', 'guide.dest_id')
                            ->findOrFail($guide_id);
        $dest = Destination::get();
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.Guide.edit',compact('data','dest','config','setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $guide_id)
    {
        $data = Guide::findOrFail($guide_id);

        $count    = Guide::where('email',$request->input('email'))
            ->count();

        if($count>0){
            return redirect()->to('admin/guide')->with('error','Email Already Exists');
        }

        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required',
            'phone'     => 'required',
        ],[

            'name.required'      => 'Please enter Name',
            'email.required'     => 'Please enter Email',
            'phone.required'     => 'Please enter Phone',
        ]);

        if ($request->file('photo')) 
        {

            $pic_path         = public_path().'/images/guide/'.$data->photo;
            unlink($pic_path);

            $file                 = $request->file('photo');
            $inisial              = $request->input('name');
            $acak                 = $file->getClientOriginalExtension();
            $filename             = $inisial.' - guide '.'.'.$acak;
            $request              -> file('photo')->move("images/guide", $filename);
            $data                 ->photo = $filename;
        }

        $data->name     = $request->input('name');
        $data->email    = $request->input('email');
        $data->phone    = $request->input('phone');
        $data->dest_id  = $request->input('dest');

        $data->update();

        return redirect()->to('admin/guide')->with('success','Update Manager Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($guide_id)
    {
        $hapus            = Guide::findOrFail($guide_id);
        $pic_path         = public_path().'/images/guide/'.$hapus->photo;
        unlink($pic_path);
        $hapus->delete();
    }
}
