<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function MenuItem(){
		    return $this->hasMany('App\Models\MenuItem','id','menu_id');
    }
}
