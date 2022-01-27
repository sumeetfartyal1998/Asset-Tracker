<?php

namespace App\Http\Controllers;

use App\Models\asset_type;
use App\Models\asset;
use App\Models\image;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Display extends Controller
{
    public function dispAssetType(){
        $type=asset_type::paginate(5);
        return view('dispAssetType')->with(['types'=>$type]);
    }
    public function dispAsset($id){
        $type=asset_type::where('id',$id)->get();
        $type_name=$type[0]->asset_type;
        // $assets=DB::table('assets')->where('asset_types_id',$id)->orderBy('created_at','desc')->paginate(5);
        // return $assets;
        $assets=asset::where('asset_types_id',$id)->paginate(2);
        return view('dispAsset')->with(['assets'=>$assets,'type_name'=>$type_name]);
    }
    public function dispImg($id){
        
        $asset=asset::where('id',$id)->get();
        $asset_name=$asset[0]->name; 
        $img=image::where('assets_id',$id)->get();
        return view('dispImg')->with(['img'=>$img,'asset_name'=>$asset_name]);
    }
    public function pie(){
        $result=DB::select(DB::raw("select count(*) as count,asset_types_id from assets group by asset_types_id"));
        
        $i=0;
        $pie="";
        foreach($result as $r){
            $res=asset_type::find($r->asset_types_id)->get();
            $pie.="['".$res[$i]->asset_type."', ".$r->count."],";
            $i++;
        }
        $pie=rtrim($pie,',');
        $result=DB::select(DB::raw("select count(*) as count,active from assets group by active"));
        $bar='["Active",'.$result[1]->count.'],["Inactive",'.$result[0]->count.']';
        return view('dashboard')->with(['pie'=>$pie,'bar'=>$bar]);
    }
}
