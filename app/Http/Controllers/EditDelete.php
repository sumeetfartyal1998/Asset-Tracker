<?php

namespace App\Http\Controllers;
use App\Models\asset;
use App\Models\asset_type;
use App\Models\image;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class EditDelete extends Controller
{
    public function delAsset(Request $req){
        
        $asset=asset::find($req->id);
        
        $img=image::where('assets_id',$req->id)->get();
        
        foreach($img as $i){
            
            if(File::delete(public_path('Uploads/'.$i->img))){
                
                $image=image::find($i->id);
                $image->delete();
            }
            else{
                return 'false';
            }
        }
        $asset->delete();
        return response()->json(['success'=>'Asset has been deleted']);
    }
    public function editAsset($id){
        $asset=asset::where('id',$id)->get();
        $type=asset_type::all();
        return view('editAsset')->with(['asset'=>$asset,'type'=>$type]);
    }
    public function updateAsset(Request $req){
        $validateData=$req->validate([
            'name'=>'required',
            'type'=>'required',
        ],[
            'name.required'=>'Asset Name is required',
            'type.required'=>'Asset Type is required'
        ]);
        if($validateData){
            $asset=asset::find($req->id);
            $asset->name=$req->name;
            $asset->asset_types_id=$req->type;
            $asset->active=$req->active;
            $asset->save();
            return back()->with('success','Asset updated successfully');
        }
    }
}
