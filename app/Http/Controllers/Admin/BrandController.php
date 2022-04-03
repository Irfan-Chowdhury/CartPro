<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Traits\ActiveInactiveTrait;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\BrandInterface;
use App\Services\BrandService;

class BrandController extends Controller
{
    use ActiveInactiveTrait;

    protected $brandService;
    public function __construct(BrandService $brandService){
        $this->brandService = $brandService;
    }


    public function index()
    {
        if (auth()->user()->can('brand-view')){
            $brands =  $this->brandService->getAllBrands();
            if (request()->ajax()){
                return $this->brandService->dataTable($brands);
            }
            return view('admin.pages.brand.index',compact('brands'));
        }
        return abort('403', __('You are not authorized'));
    }



    /*
    |--------------------------------------------------------------------------
    | Active-Inactive-Bulk
    |--------------------------------------------------------------------------
    |
    |
    */
}
