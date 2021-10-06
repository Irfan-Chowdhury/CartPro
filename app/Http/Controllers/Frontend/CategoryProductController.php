<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function categoryWiseProducts($slug)
    {
        $category = Category::with('categoryProduct.categoryTranslation','categoryProduct.categoryTranslationDefaultEnglish','categoryProduct.product','categoryProduct.productTranslation','categoryProduct.productTranslationDefaultEnglish','categoryProduct.productBaseImage','categoryProduct.additionalImage')
                        ->where('slug',$slug)
                        ->first();

        // return $category->categoryProduct->count();


        // return $category[0]->categoryProduct;

        return view('frontend.pages.category_wise_products',compact('category'));
    }
}
