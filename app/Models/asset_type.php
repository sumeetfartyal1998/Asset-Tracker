<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asset_type extends Model
{
    use HasFactory;
    public function getAsset(){
        return $this->hasMany('App\Models\asset','asset_types_id','id');
    }
}


           