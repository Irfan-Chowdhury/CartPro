<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeProduct extends Model
{
    use HasFactory;

    protected $table = 'attribute_product';

    protected $fillable = ['attribute_id','product_id'];
}
