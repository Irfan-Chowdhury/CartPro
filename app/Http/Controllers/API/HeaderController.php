<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\HeaderResource;
use App\Services\HeaderService;

class HeaderController extends Controller
{
    public $headerService;
    public function storefrontHeaderData(HeaderService $headerService)
    {
        $headerData = $headerService->getHeaderDataForApi();

        return new HeaderResource($headerData);
    }


    // private function getCategoryMenuList()
    // {
    //     $categories = Category::with(['translations','parentCategory','child'])
    //         ->where('is_active',1)
    //         ->orderBy('is_active','DESC')
    //         ->orderBy('id','ASC')
    //         ->get();

    //     $categoryProductCount = [];
    //     foreach ($categories as $category) {
    //         $product_count = 0;
    //         if ($category->categoryProduct) {
    //             foreach ($category->categoryProduct as $item) {
    //                 if ($item->product) {
    //                     $product_count++;
    //                 }
    //             }
    //         }
    //         $categoryProductCount[$category->id] = $product_count;
    //     }


    //     $categoryMenuList = [];
    //     $subCategoryMenus = [];
    //     foreach ($categories->where('parent_id',NULL) as $key => $category) {
    //         if ($category->child->isNotEmpty()) {
    //             foreach ($category->child as $key2 => $item) {
    //                 $subCategoryMenus[$key2]['id'] = $item->id;
    //                 $subCategoryMenus[$key2]['slug'] = $item->slug;
    //                 $subCategoryMenus[$key2]['categoryName'] = $item->translation->category_name;
    //                 $subCategoryMenus[$key2]['icon'] = $item->icon;
    //                 $subCategoryMenus[$key2]['totalProducts'] = $categoryProductCount[$item->id];
    //             }
    //             $categoryMenuList[$key]['id'] = $category->id;
    //             $categoryMenuList[$key]['slug'] = $category->slug;
    //             $categoryMenuList[$key]['categoryName'] = $category->translation->category_name;
    //             $categoryMenuList[$key]['icon'] = $category->icon;
    //             $categoryMenuList[$key]['totalProducts'] = $categoryProductCount[$category->id];
    //             $categoryMenuList[$key]['subCategoryMenus'] = $subCategoryMenus;
    //         }
    //         else {
    //             $categoryMenuList[$key]['id'] = $category->id;
    //             $categoryMenuList[$key]['slug'] = $category->slug ?? null;
    //             $categoryMenuList[$key]['categoryName'] = $category->translation->category_name ?? null;
    //             $categoryMenuList[$key]['icon'] = $category->icon ?? null;
    //             $categoryMenuList[$key]['totalProducts'] = $categoryProductCount[$category->id];
    //             $categoryMenuList[$key]['subCategoryMenus'] = [];
    //         }
    //     }

    //     return $categoryMenuList;
    // }
}
