<?php

namespace App\Repositories\Brand;

use App\Contracts\Brand\BrandContract;
use App\Models\Brand;
use App\Traits\ActiveInactiveTrait;

class BrandRepository implements BrandContract
{

    public function getAllBrands()
    {
        return Brand::orderBy('is_active','DESC')
                ->orderBy('id','DESC')
                ->get()
                ->map->format();
    }




}


