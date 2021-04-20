<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['slug','is_active'];

    public function pageTranslations()
    {
    	return $this->hasMany(PageTranslation::class,'page_id');
    }
}
