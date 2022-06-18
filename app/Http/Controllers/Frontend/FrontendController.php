<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Mapper;
use App\Guide;
use App\Type;
use App\Destination;
use App\Picture;
use App\Setting;

class FrontendController extends Controller
{
    public function index()
    {
        $datas = Destination::leftJoin('users','users.users_id', '=', 'destination.users_id')
                                ->orderBy('destination.created_at','desc')
                                ->paginate(5);
        $types = Type::get();

        foreach ($types as $key=>$value) {
            $skill = DB::table('destination')->select(DB::raw('count(*) as category_count'))
                                ->where('type_id', $value->type_id)
                                ->get();

                $types[$key]->category_count = $skill;  

            }

        $recent  = Destination::orderBy('created_at', 'asc')->paginate(5);
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];

        return view('Frontend.home',compact('datas','types','recent','setting','config'));
    }

    public function destinationDetail($dest_id)
    {
        $data = Destination::leftJoin('type','type.type_id', '=', 'destination.type_id')
                                ->leftJoin('users','users.users_id', '=', 'destination.users_id')
                                ->leftJoin('city','city.city_id', '=', 'destination.city_id')
                                ->leftJoin('district','district.district_id', '=', 'district.district_id')
                                ->findOrFail($dest_id);
        
        // $pict = Picture::where('dest_id', '=', $data->dest_id)->get();
   
        // foreach($pict as $valPict)
        //         {
        //             $pictName = Picture::find($valPict->dest_id);
        //             $valPict->picture_name = $pictName->ket_pict;
        //         }
        // $data->pict = $pict->toArray();


        foreach($data as $key=>$value){
            $skill = DB::table('type')->where('type.type_id','=', $dest_id)
                                        ->count();
            }
                                
        $types   = Type::get();

        foreach ($types as $key=>$value) {
            $skill = DB::table('destination')->select(DB::raw('count(*) as category_count'))
                                ->where('type_id', $value->type_id)
                                ->get();

                $types[$key]->category_count = $skill;  

            }

        $recent  = Destination::orderBy('created_at', 'asc')->paginate(5);
        $related = Destination::where('dest_id','!=',$data->dest_id)
                                ->where('type_id','=',$data->type_id)
                                ->paginate(5);
        
        $map = Mapper::map(-6.337310, 108.325833, ['zoom' => 15, 'center' => false, 'marker' => false]);
                                
        $mapArrays = DB::table('destination')->where('dest_id','=',$data->dest_id)->get();

        foreach($mapArrays as $mapArray){ 
            // $map = $map->marker($mapArray->latitude,$mapArray->longitude,['markers' => ['icon' => '']]);
            $info = 'Destination Name : '.$mapArray->dest_name."<br>".'Address : '.$mapArray->address;
            $map = $map->informationWindow($mapArray->latitude,$mapArray->longitude, $info, ['markers' => [['symbol' => 'CIRCLE', 'scale' => 10],'animation' => 'DROP']]);
                                  // return;
        }
                        
        $mapRender = $map->render();
                        

        $setting = Setting::get();
        $config  = DB::table('setting')
                                                ->get()[0];
        
        return view('Frontend.Detail.index', compact('data','types','skill','recent','related','config','setting','mapRender'));
    }

    public function Maps()
    {        
        $map = Mapper::map(-6.337310, 108.325833, ['zoom' => 100, 'center' => false, 'marker' => false]);

        // $map = Mapper::map(52.381128999999990000, 0.470085000000040000)->informationWindow(53.381128999999990000, -1.470085000000040000, 'Content', ['markers' => ['animation' => 'DROP']]);
                                
        $mapArrays = DB::table('destination')->get();

        foreach($mapArrays as $mapArray){ 
            $url = url('/destination/detail', $mapArray->dest_id);
            $detailUrl = "<a href='$url'>Detail Information</a>";
            // $map = $map->marker($mapArray->latitude,$mapArray->longitude,['markers' => ['icon' => '']]);
            $info = 'Destination Name : '.$mapArray->dest_name."<br>".'Address : '.$mapArray->address."<br>".$detailUrl;
            $map = $map->informationWindow($mapArray->latitude,$mapArray->longitude, $info, ['markers' => ['animation' => 'DROP']]);
                                  // return;
        }
                        
        $mapRender = $map->render();
                        

        $setting = Setting::get();
        $config  = DB::table('setting')
                                                ->get()[0];
        
        return view('Frontend.Maps.index', compact('config','setting','mapRender'));
    }


    public function searchDestination(Request $request){

        $search = $request->get('search');
        $result  = Destination::leftJoin('type','type.type_id', '=', 'destination.type_id')
                                ->orWhere('destination.dest_name', 'LIKE', '%' . $search . '%')
                                ->orWhere('type.type_name', 'LIKE', '%' . $search . '%')
                                ->paginate(5);

        $result->appends(['search' => $search]);
                        
        $types = Type::get();
        foreach ($types as $key=>$value) {
            $skill = DB::table('destination')->select(DB::raw('count(*) as category_count'))
                                ->where('type_id', $value->type_id)
                                ->get();

                $types[$key]->category_count = $skill;  

            }  

        $recent  = Destination::orderBy('created_at', 'asc')->paginate(5);
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];


        return view('Frontend.Search.index', compact('result', 'search','recent','types','config','setting'));
    }

    public function categoryDestination($type_id)
    {
        $result = Destination::leftJoin('type','type.type_id', '=', 'destination.type_id')
                                ->where('destination.type_id', '=', $type_id)
                                ->orderBy('destination.created_at','desc')
                                ->paginate(5);
        
        $typName = DB::table('type')->select('type_name')->where('type.type_id','=', $type_id)->get();
        $result->typName = $typName->toArray();
         
        $types   = Type::get();
        foreach ($types as $key=>$value) {
            $skill = DB::table('destination')->select(DB::raw('count(*) as category_count'))
                                ->where('type_id', $value->type_id)
                                ->get();

                $types[$key]->category_count = $skill;  

            }

        $recent  = Destination::orderBy('created_at', 'asc')->paginate(5);
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];
        
        return view('Frontend.Category.index', compact('result','types','recent','typName','config','setting'));
    }

    public function guideDestination($dest_id)
    {
        $result = Guide::leftJoin('destination','destination.dest_id', '=', 'guide.dest_id')
                                ->where('guide.dest_id', '=', $dest_id)
                                ->paginate(5);
        
        $destName = DB::table('destination')->select('dest_name')->where('dest_id','=', $dest_id)->get();
        $result->destName = $destName->toArray();
         
        $types   = Type::get();
        foreach ($types as $key=>$value) {
            $skill = DB::table('destination')->select(DB::raw('count(*) as category_count'))
                                ->where('type_id', $value->type_id)
                                ->get();

                $types[$key]->category_count = $skill;  

            }

        $recent  = Destination::orderBy('created_at', 'asc')->paginate(5);
        $setting = Setting::get();
        $config  = DB::table('setting')
                        ->get()[0];
        
        return view('Frontend.Guide.index', compact('result','types','recent','destName','config','setting'));
    }
}
