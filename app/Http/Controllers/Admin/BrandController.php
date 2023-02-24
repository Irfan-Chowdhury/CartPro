<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandStoreRequest;
use App\Http\Requests\Brand\BrandUpdateRequest;
use App\Models\Brand;
use App\Services\BrandService;
use App\Traits\TranslationTrait;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    use TranslationTrait;

    protected $brandService;
    public function __construct(BrandService $brandService){
        $this->brandService = $brandService;
    }


    public function index()
    {
        // Test

        // return Brand::with('brandTranslations')
        // ->orderBy('id','DESC')
        // ->get()
        // ->map(function($brand){
        //     return [
        //         'id'=>$brand->id,
        //         'slug'=>$brand->slug,
        //         'is_active'=>$brand->is_active,
        //         'brand_logo'=>$brand->brand_logo ?? null,
        //         // 'brand_name'=>$brand->brandTranslation->brand_name ?? $brand->brandTranslationEnglish->brand_name ?? null,
        //         'brand_name'=> $this->translations($brand->brandTranslations)->brand_name ?? null,
        //     ];
        // });
        // Test



        if (auth()->user()->can('brand-view')){
            $brands =  $this->brandService->getAllBrands();

            if (request()->ajax()){
                return $this->brandService->dataTable($brands);
            }
            return view('admin.pages.brand.index',compact('brands'));
        }
        return abort('403', __('You are not authorized'));
    }

    public function store(BrandStoreRequest $request)
    {
        if (auth()->user()->can('brand-store')){
            return $this->brandService->storeBrand($request);
        }
    }

    public function brandEdit($id)
    {
        $brand = $this->brandService->findBrand($id);
        $brandTranslation = $this->brandService->findBrandTranslation($id); //this id means brand_id
        return view('admin.pages.brand.edit',compact('brand','brandTranslation'));
    }

    public function brandUpdate(BrandUpdateRequest $request, $id)
    {
        if (auth()->user()->can('brand-edit')){
            return $this->brandService->updateBrand($request);
        }
    }


    public function active(Request $request){
        if ($request->ajax()){
            return $this->brandService->activeById($request->id);
        }
    }

    public function inactive(Request $request){
        if ($request->ajax()){
            return $this->brandService->inactiveById($request->id);
        }
    }

    public function delete(Request $request){
        return $this->brandService->destroy($request->id);
    }

    public function bulkAction(Request $request){
        if ($request->ajax()) {
            return $this->brandService->bulkActionByTypeAndIds($request->action_type, $request->idsArray);
        }
    }

}
