<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key','is_translatable','plain_value'];

    public function settingTranslations()
    {
    	return $this->hasMany(SettingTranslation::class,'setting_id');
    }

    public function storeFrontImage()
    {
    	return $this->hasOne(StorefrontImage::class,'setting_id');
    }
}
