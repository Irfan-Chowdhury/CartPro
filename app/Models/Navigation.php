<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    public function parentMenu()
    {
        return $this->belongsTo(self::class,'parent_id');
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Navigation','parent_id');
    }

    public function page(){
		return $this->hasOne('App\Models\Page','id','page_id');
    }
}
