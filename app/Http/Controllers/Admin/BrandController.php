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

class BrandController extends Controller
{
    use ActiveInactiveTrait;

    protected $brand;
    public function __construct(BrandInterface $brand){
        $this->brand = $brand;
    }


    public function index()
    {
        if (auth()->user()->can('brand-view'))
        {
            App::setLocale(session('currentLocal'));
            $brands = $this->brand->getAll();

            if (request()->ajax())
            {
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
            return view('admin.pages.brand.index',compact('brands'));
        }
        return abort('403', __('You are not authorized'));
    }

    public function store(StoreBrandRequest $request)
    {
        if (auth()->user()->can('brand-store')){

            // return $request->all();

            $this->brand->store($request->all());
            session()->flash('type','success');
            session()->flash('message','Successfully Saved');
            return redirect()->back();
        }
    }

    public function brandEdit($id)
    {
        App::setLocale(session('currentLocal'));
        $brand = $this->brand->findById($id);
        $brandTranslation = $this->brand->brandTranslation($id);
        return view('admin.pages.brand.edit',compact('brand','brandTranslation'));
    }

    public function brandUpdate(StoreBrandRequest $request, $id)
    {
        if (auth()->user()->can('brand-edit'))
        {
            $this->brand->update($id, $request->all());
            session()->flash('type','success');
            session()->flash('message','Successfully Updated');
            return redirect()->back();
        }

    }

    /*
    |--------------------------------------------------------------------------
    | Active-Inactive-Bulk
    |--------------------------------------------------------------------------
    |
    |
    */

    public function active(Request $request){
        if ($request->ajax()){
            return $this->activeData($this->brand->findById($request->id));
        }
    }

    public function inactive(Request $request){
        if ($request->ajax()){
            return $this->inactiveData($this->brand->findById($request->id));
        }
    }

    public function bulkAction(Request $request){
        if ($request->ajax()) {
            return $this->bulkActionData($request->action_type, $this->brand->selectedBrands($request->idsArray));
        }
    }
}
