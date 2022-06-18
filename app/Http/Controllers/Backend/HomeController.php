<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;
use App\Guide;
use App\Destination;
use App\Setting;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $desti  = Destination::orderBy('created_at','desc')->paginate(5);
        $dest   = Destination::get();
        $guide  = Guide::get();
        $type   = Type::get();
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Backend.home',compact('dest','guide','type','desti','config','setting'));
    }
}
