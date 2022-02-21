<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Models\BrandTranslation;
use App\Traits\SlugTrait;
use App\Traits\imageHandleTrait;
use Illuminate\Support\Facades\DB;
use App\Interfaces\BrandInterface;

class BrandRepository implements BrandInterface
{
    use SlugTrait, imageHandleTrait;

    public function getAll()
    {
        $brands = Brand::orderBy('is_active','DESC')
                ->orderBy('id','DESC')
                ->get()
                ->map->format();

        return json_decode(json_encode($brands), FALSE);
    }

    public function store(array $data)
    {
        $brand       = new Brand();
        $brand->slug = $this->slug($data['brand_name']);
        if (isset($data['brand_logo'])) {
            $brand->brand_logo = $this->imageStore($data['brand_logo'], $directory='images/brands/', $type='brand');
        }
        $brand->is_active = $data['is_active']!=NULL ? $data['is_active'] : 0 ;
        $brand->save();

        $brandTranslation             = new BrandTranslation();
        $brandTranslation->brand_id   = $brand->id;
        $brandTranslation->local      = session('currentLocal');
        $brandTranslation->brand_name = $data['brand_name'];
        $brandTranslation->save();
        return;
    }

    public function findById($id){
        return Brand::find($id);
    }

    public function update($id, array $data)
    {
        $brand = $this->findById($id);
        if (session('currentLocal')=='en') {
            $brand->slug = $this->slug($data['brand_name']);
        }
        if (isset($data['brand_logo'])) {
            $brand->brand_logo = $this->imageStore($data['brand_logo'], $directory='images/brands/', $type='brand');
        }
        $brand->is_active = $data['is_active']!=NULL ? $data['is_active'] : 0 ;
        $brand->save();

        DB::table('brand_translations')
            ->updateOrInsert(
                ['brand_id' => $id, 'local' => session('currentLocal')],
                ['brand_name' => $data['brand_name'] ]
            );
    }

    public function selectedBrands($idsArray){
        return Brand::whereIn('id',$idsArray);
    }

    public function brandTranslation($brand_id){
        $brandTranslation = BrandTranslation::where('brand_id',$brand_id)->where('local',session('currentLocal'))->first();
        if (!isset($brandTranslation)) {
            $brandTranslation = BrandTranslation::where('brand_id',$brand_id)->where('local','en')->first();
        }
        return $brandTranslation;
    }


}


