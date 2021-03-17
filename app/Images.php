<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
        'img_name','img_order','status'
    ];
}
