<?php

// namespace App\Models;
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Page extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'URL','meta_title','meta_description','og_title','og_image','og_descripton','status',
    ];
}
