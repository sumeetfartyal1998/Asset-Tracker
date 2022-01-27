<?php

namespace App\Http\Controllers;

use App\Models\asset_type;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\asset;
use App\Models\image;


class Main extends Controller
{
    public function login(Request $req){
        $validateData=$req->validate([
            'email'=>'required',
            'pass'=>'required'
        ],[
            'email.required'=>'Email id is required',
            'pass.required'=>'Password is required'
        ]);
        if($validateData){
            if($data=User::where('email',$req->email)->first()){
                
                if(Hash::check($req->pass,$data->password)){
                    $req->session()->put('data',$data);
                    return redirect('dashboard');
                }else{
                    return back()->with('errMsg','Invalid Password');
                }
            }else{
                return back()->with('errMsg','Invalid Email id');
            }
        }
    }
    public function addAssetType(Request $req){
        $validateData=$req->validate([
            'type'=>'required',
            'desc'=>'nullable|max:500'
        ],[
            'type.required'=>'Asset name is required',
            
        ]);
        if($validateData){
            $data=new asset_type();
            $data->asset_type=$req->type;
            $data->asset_desc=$req->desc;
            $data->save();
            return back()->with(['success'=>'Asset Type Created Successfully']);
        }
    }
    public function dropdown(){
        $data=asset_type::all();
        return view('addAsset')->with('data',$data);
    }

    // Adding assets
    public function addAsset(Request $req){
        $validateData=$req->validate([
            'asset'=>'required',
            'type'=>'required',
            'img[]'=>'mimes:jpeg,jpg,png'
        ],[
            'asset.required'=>'Asset name is required',
            'type.required'=>'Asset type is required',
            'img[].mimes'=>'Only image file required with .jpeg,.jpg and .png extensions.',
        ]);
        if($validateData){
            $asset_data=new asset();
            $asset_data->code=rand(1000000000000000,9999999999999999);
            $asset_data->asset_types_id=$req->type;
            $asset_data->name=$req->asset;
            $asset_data->active=$req->active;
            $asset_data->save();
            foreach($req->img as $img){
                $img_name='Image-'.rand().'.'.$img->extension();
                $image_data=new image();
                $db=asset::latest()->first();
                $image_data->img=$img_name;
                $image_data->assets_id=$db['id'];
                if($img->move(public_path('Uploads'),$img_name)){
                    $image_data->save();
                }                 
            }
            return back()->with('success','Asset added successfully');
        }
    }
    public function logout(){
        session()->forget('data');
        return redirect('');
    }
}
