<?php

namespace App\Repositories;

use App\Traits\SlugTrait;
use App\Traits\imageHandleTrait;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Interfaces\CategoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryRepository implements CategoryInterface
{
    use SlugTrait, imageHandleTrait;

    public function getAll()
    {

        return Category::with(['catTranslation','parentCategory.catTranslation'])
            ->orderBy('is_active','DESC')
            ->orderBy('id','DESC')
            ->get()
            ->map(function($category){
                return [
                    'id'=>$category->id,
                    'image'=>$category->image,
                    'is_active'=>$category->is_active,
                    'category_name'=>$category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null,
                    'parent_category_name'=> ($category->parentCategory!=NULL) ? ($category->parentCategory->catTranslation->category_name ?? $category->parentCategory->categoryTranslationDefaultEnglish->category_name) : 'NONE',
                ];
            });

    }

    public function store(array $data)
    {
        $category            = new Category();
        $category->slug      = $this->slug(htmlspecialchars_decode($data['category_name']));
        $category->parent_id = $data['parent_id']!=NULL ? $data['parent_id'] : NULL ;
        $category->icon      = $data['category_icon'];
        $category->image     = array_key_exists("image",$data)==true ? $this->imageStore($data['image'], $directory='images/categories/',$type='category'): NULL;
        $category->top       = array_key_exists("top",$data)==true ? $data['top']: 0;
        $category->is_active = array_key_exists("is_active",$data)==true ? $data['is_active']: 0;
        $category->save();

        $categoryTranslation                = new CategoryTranslation();
        $categoryTranslation->category_id   = $category->id;
        $categoryTranslation->local         = session('currentLocal');
        $categoryTranslation->category_name = htmlspecialchars_decode($data['category_name']);
        $categoryTranslation->save();
    }

    public function find($id){
        return Category::find($id);
    }

    public function update($id, array $data)
    {
        $category = $this->find($id);

        if (session('currentLocal')=='en') {
            $category->slug   =  $this->slug(htmlspecialchars_decode($data['category_name']));
        }
        $category->parent_id  = $data['parent_id']!=NULL ? $data['parent_id'] : NULL ;
        $category->icon       = $data['category_icon']!=NULL ? $data['category_icon'] : NULL ;

        if (isset($data['image'])) {
            $this->previousImageDelete($category->image);
            $category->image  = $this->imageStore($data['image'], $directory='images/categories/',$type='category');
        }
        $category->update();


        DB::table('category_translations')
        ->updateOrInsert(
            ['category_id' => $data['category_id'],
              'local'      => session('currentLocal'),
            ],
            ['category_name'=> htmlspecialchars_decode($data['category_name'])]
        );
    }

    public function categoryTranslation($category_id){
        $categoryTranslation =  CategoryTranslation::where('category_id',$category_id)->where('local',session('currentLocal'))->first();
        if (!isset($categoryTranslation)) {
            $categoryTranslation =  CategoryTranslation::where('category_id',$category_id)->where('local','en')->first();
        }
        return $categoryTranslation;
    }

    public function selectedCategories($idsArray){
        return Category::whereIn('id',$idsArray);
    }

}


