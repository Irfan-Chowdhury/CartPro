<?php

namespace App\Services;

use App\Contracts\Brand\BrandContract;
use App\Contracts\Brand\BrandTranslationContract;
use App\Traits\imageHandleTrait;
use App\Traits\SlugTrait;
use Illuminate\Support\Facades\File;

class BrandService
{
    use SlugTrait, imageHandleTrait;

    private $brandContract;
    private $brandTranslationContract;
    public function __construct(BrandContract $brandContract, BrandTranslationContract $brandTranslationContract)
    {
        $this->brandContract            = $brandContract;
        $this->brandTranslationContract = $brandTranslationContract;
    }

    public function getAllBrands()
    {
        return $this->brandContract->getAllBrands();
    }

    public function dataTable($data)
    {
        $brands = json_decode(json_encode($data), FALSE);

        return datatables()->of($brands)
                ->setRowId(function ($row){
                    return $row->id;
                })
                ->addColumn('brand_logo', function ($row)
                {
                    if ($row->brand_logo==null) {
                        $url = 'https://dummyimage.com/50x50/000000/0f6954.png&text=Brand';
                    }
                    elseif ($row->brand_logo!=null) {
                        if (!File::exists(public_path($row->brand_logo))) {
                            $url = 'https://dummyimage.com/50x50/000000/0f6954.png&text=Brand';
                        }else {
                            $url = url("public/".$row->brand_logo);
                        }
                    }
                    return  '<img src="'. $url .'" height="50px" width="50px"/>';
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
                            $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-danger btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
                        }else {
                            $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>';
                        }
                    }
                    return $actionBtn;
                })
                ->rawColumns(['brand_logo','action'])
                ->make(true);
    }
}
