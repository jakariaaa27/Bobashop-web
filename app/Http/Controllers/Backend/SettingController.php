<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Auth;
use DB;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function IndexBackend(){

        if(Auth::user()->status == 'staff') {
            return redirect()->to('/admin/dashboard/')->with('error','access is forbidden');
        }

        $datas = Setting::get();
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.Setting.backend',compact('datas','config','setting'));

    }

    public function IndexFrontend(){

        if(Auth::user()->status == 'staff') {
            return redirect()->to('/admin/dashboard/')->with('error','access is forbidden');
        }

        $datas = Setting::get();
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.Setting.frontend',compact('datas','setting','config'));

    }

    public function updateBackend(Request $request, $setting_id){

        $data = Setting::findOrFail($setting_id);

        if ($request->file('background_login')) 
        {

            $pic_path         = public_path().'/images/backend/'.$data->background_login;
            unlink($pic_path);

            $file                 = $request->file('background_login');
            $inisial              = $request->input('site_name');
            $acak                 = $file->getClientOriginalExtension();
            $filename             = $inisial.' - background_login '.'.'.$acak;
            $request              -> file('background_login')->move("images/backend", $filename);
            $data                 ->background_login = $filename;
        }

        $data->site_name      = $request->input('site_name');
        $data->site_desc      = $request->input('site_desc');
        $data->logo_text1     = $request->input('logo_text1');
        $data->logo_text2     = $request->input('logo_text2');
        $data->footer_backend = $request->input('footer');

        $data->update();

        return redirect()->to('admin/setting/backend')->with('success','Update Setting Backend Success');

    }

    public function updateFrontend(Request $request, $setting_id){

        $data = Setting::findOrFail($setting_id);

        if ($request->file('logo')) 
        {

            $pic_path         = public_path().'/images/frontend/'.$data->logo;
            unlink($pic_path);

            $file                 = $request->file('logo');
            $inisial              = $request->input('site_name');
            $acak                 = $file->getClientOriginalExtension();
            $filename             = $inisial.' - logo '.'.'.$acak;
            $request              -> file('logo')->move("images/frontend", $filename);
            $data                 ->logo = $filename;
        }

        if ($request->file('front_logo')) 
        {

            $pic_path         = public_path().'/images/frontend/'.$data->front_logo;
            unlink($pic_path);

            $file                 = $request->file('front_logo');
            $inisial              = $request->input('site_name');
            $acak                 = $file->getClientOriginalExtension();
            $filename             = $inisial.' - front_logo '.'.'.$acak;
            $request              -> file('front_logo')->move("images/frontend", $filename);
            $data                 ->front_logo = $filename;
        }

        if ($request->file('jumbotron')) 
        {

            $pic_path         = public_path().'/images/frontend/'.$data->jumbotron;
            unlink($pic_path);

            $file                 = $request->file('jumbotron');
            $inisial              = $request->input('site_name');
            $acak                 = $file->getClientOriginalExtension();
            $filename             = $inisial.' - jumbotron '.'.'.$acak;
            $request              -> file('jumbotron')->move("images/frontend", $filename);
            $data                 ->jumbotron = $filename;
        }

        $data->simple_text        = $request->input('simple_text');
        $data->footer_frontend    = $request->input('footer');

        $data->update();

        return redirect()->to('admin/setting/frontend')->with('success','Update Setting Frontend Success');
        
    }
    
    
}
