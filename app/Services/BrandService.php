<?php

namespace App\Services;

use App\Contracts\Brand\BrandContract;
use App\Contracts\Brand\BrandTranslationContract;
use App\Models\Brand;
use App\Traits\ArrayToObjectConvertionTrait;
use App\Traits\imageHandleTrait;
use App\Traits\SlugTrait;
use App\Traits\WordCheckTrait;
use Illuminate\Support\Facades\File;

class BrandService
{
    use SlugTrait, imageHandleTrait, ArrayToObjectConvertionTrait, WordCheckTrait;

    private $brandContract;
    private $brandTranslationContract;
    public function __construct(BrandContract $brandContract, BrandTranslationContract $brandTranslationContract)
    {
        $this->brandContract            = $brandContract;
        $this->brandTranslationContract = $brandTranslationContract;
    }

    public function getAllBrands()
    {
        $onlyActive = !$this->wordCheckInURL('brands');

        return $this->getBrands($onlyActive);
    }

    private function getBrands($onlyActive = false)
    {
        $query = Brand::with('translations')
                    ->orderBy('is_active','DESC')
                    ->orderBy('id','DESC');

        if ($onlyActive) {
            $query->where('is_active', 1);
        }

        $result = $query->get()
                    ->map(function($brand){
                        return [
                            'id'=>$brand->id,
                            'slug'=>$brand->slug,
                            'is_active'=>$brand->is_active,
                            'brand_logo'=> isset($brand->brand_logo) && file_exists(public_path($brand->brand_logo)) ? asset($brand->brand_logo) : 'https://dummyimage.com/50x50/000000/0f6954.png&text=Brand',
                            'brand_name'=>$brand->translation->brand_name ?? null,
                        ];
                    });


        return $this->arrayToObject($result);
    }




    public function dataTable($data)
    {

        $brandData = self::getAllBrands();

        $brands = $this->arrayToObject($brandData);

        return datatables()->of($brands)
                ->setRowId(function ($row){
                    return $row->id;
                })
                ->addColumn('brand_logo', function ($row)
                {
                    return  '<img src="'. $row->brand_logo .'" height="50px" width="50px"/>';
                })
                ->addColumn('brand_name', function ($row)
                {
                    return $row->brand_name;
                })
                ->addColumn('action', function ($row)
                {
                    $actionBtn = "";
                    if (auth()->user()->can('brand-edit')){
                        $actionBtn .= '<a href="'.route('admin.brand.edit', $row->id) .'" class="edit btn btn-primary btn-sm" title="Edit"><i class="dripicons-pencil"></i></a>
                        &nbsp; ';
                    }
                    if (auth()->user()->can('brand-action')){
                        if ($row->is_active==1) {
                            $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-warning btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
                        }else {
                            $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>';
                        }
                        $actionBtn .= '<button type="button" title="Delete" class="delete btn btn-danger btn-sm ml-2" title="Edit" data-id="'.$row->id.'"><i class="dripicons-trash"></i></button> &nbsp; ';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['brand_logo','action'])
                ->make(true);
    }

    public function storeBrand($request)
    {
        $data  = $this->requestHandleData($request, $brand = null);
        $brand = $this->brandContract->storeBrand($data);

        $dataTranslation  = [];
        $dataTranslation['brand_id']   = $brand->id;
        $dataTranslation['local']      = session('currentLocale');
        $dataTranslation['brand_name'] = htmlspecialchars_decode($request->brand_name);
        $this->brandTranslationContract->storeBrandTranslation($dataTranslation);
        return response()->json(['success' => __('Data Successfully Saved')]);
    }

    public function findBrand($id)
    {
        return $this->brandContract->getById($id);
    }

    public function findBrandTranslation($brand_id)
    {
        $brandTranslation = $this->brandTranslationContract->getByIdAndLocale($brand_id,session('currentLocale'));
        if (!isset($brandTranslation)) {
            $brandTranslation =  $this->brandTranslationContract->getByIdAndLocale($brand_id,'en');
        }
        return $brandTranslation;
    }

    public function updateBrand($request)
    {
        if (env('USER_VERIFIED')!=1) {
            session()->flash('type','danger');
            session()->flash('message','Disabled for demo !');
            return redirect()->back();
        }
        $brand = $this->findBrand($request->brand_id);
        $data     = $this->requestHandleData($request, $brand);
        $this->brandContract->updateBrandById($request->brand_id, $data);
        $this->brandTranslationContract->updateOrInsertBrandTranslation($request);

        session()->flash('type','success');
        session()->flash('message','Successfully Updated');
        return redirect()->back();
    }

    protected function requestHandleData($request, $brand)
    {
        $data              = [];
        $data['slug']      = $this->slug(htmlspecialchars_decode($request->brand_name));
        $data['is_active'] = ($request->is_active==true) ? 1 : 0;
        if ($request->brand_logo) {
            if ($brand) {
                $this->previousImageDelete($brand->brand_logo);
            }
            $data['brand_logo'] = $this->imageStore($request->brand_logo, $directory='images/brands/', $type='brand');
        }
        return $data;
    }

    public function activeById($id)
    {
        if (env('USER_VERIFIED')!=1) {
            return response()->json(['demo' => 'Disabled for demo !']);
        }
        return $this->brandContract->active($id);
    }

    public function inactiveById($id)
    {
        if (env('USER_VERIFIED')!=1) {
            return response()->json(['demo' => 'Disabled for demo !']);
        }
        return $this->brandContract->inactive($id);
    }

    public function destroy($id){
        $this->brandContract->destroy($id);
        $this->brandTranslationContract->destroy($id);
        return response()->json(['success' => 'Data Deleted Successfully']);
    }

    public function bulkActionByTypeAndIds($type, $ids)
    {
        if (env('USER_VERIFIED')!=1) {
            return response()->json(['demo' => 'Disabled for demo !']);
        }
        return $this->brandContract->bulkAction($type, $ids);
    }


    //Front - HomeController
    public function getBrandsWhereInIds($ids)
    {

        $data = Brand::with('translations')->whereIn('id',$ids)
                ->where('is_active',1)
                ->orderBy('is_active','DESC')
                ->orderBy('id','DESC')
                ->get()
                ->map(function($brand){
                    return [
                        'id'=>$brand->id,
                        'slug'=>$brand->slug,
                        'is_active'=>$brand->is_active,
                        'brand_logo'=>$brand->brand_logo ?? null,
                        'brand_name'=>$brand->translation->brand_name,
                    ];
                });

        return json_decode(json_encode($data), FALSE);
    }

}
