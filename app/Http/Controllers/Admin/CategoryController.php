<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Traits\ActiveInactiveTrait;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use App\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
    use ActiveInactiveTrait;

    protected $category;
    public function __construct(CategoryInterface $category){
        $this->category = $category;
    }

    public function index()
    {
        App::setLocale(Session::get('currentLocal'));

        if (auth()->user()->can('category-view'))
        {
            $categories = $this->category->getAll();

            //Check Later
            if (request()->ajax())
            {
                return datatables()->of($categories)
                    ->setRowId(function ($category){
                        return $category['id'];
                    })
                    ->addColumn('category_image', function ($row){
                        if ($row['image']==null) {
                            return '<img src="'.url("public/images/empty.jpg").'" alt="" height="50px" width="50px">';
                        }
                        else {
                            if (!File::exists(public_path($row['image']))) {
                                $url = 'https://dummyimage.com/50x50/000000/0f6954.png&text=Category';
                            }else {
                                $url = url("public/".$row['image']);
                            }
                            return  '<img src="'. $url .'" height="50px" width="50px"/>';
                        }
                    })
                    ->addColumn('category_name', function ($row){
                        return $row['category_name'] ?? $row['category_name'] ?? NULL;
                    })
                    ->addColumn('parent', function ($row){
                        return $row['parent_category_name'];
                    })
                    ->addColumn('is_active', function ($row){
                        if($row['is_active']==1){
                            return '<span class="p-2 badge badge-success">Active</span>';
                        }else{
                            return '<span class="p-2 badge badge-danger">Inactive</span>';
                        }
                    })
                    ->addColumn('action', function ($row){
                        $actionBtn = "";
                        if (auth()->user()->can('category-edit')){
                            $actionBtn .= '<button type="button" title="Edit" class="edit btn btn-info btn-sm" title="Edit" data-id="'.$row['id'].'"><i class="dripicons-pencil"></i></button>
                                            &nbsp; ';
                        }
                        if (auth()->user()->can('category-action')){
                            if ($row['is_active']==1) {
                                $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-danger btn-sm" data-id="'.$row['id'].'"><i class="fa fa-thumbs-down"></i></button>';
                            }else {
                                $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row['id'].'"><i class="fa fa-thumbs-up"></i></button>';
                            }
                        }
                        return $actionBtn;

                    })
                    ->rawColumns(['is_active','action','category_image'])
                    ->make(true);
            }
            return view('admin.pages.category.index',compact('categories'));
        }
        return abort('403', __('You are not authorized'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->can('category-store')){

            $validator = Validator::make($request->only('category_name'),[
                'category_name' => 'required|unique:category_translations,category_name',
            ]);
            if ($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all()]);
            }
            $this->category->store($request->all());
            return response()->json(['success' => __('Data Successfully Saved')]);
        }
    }

    public function edit(Request $request)
    {
        $category            = $this->category->find($request->category_id);
        $categoryTranslation = $this->category->categoryTranslation($request->category_id);

        return response()->json(['category'=>$category, 'categoryTranslation'=>$categoryTranslation]);
    }

    public function update(Request $request)
    {
        if (auth()->user()->can('category-edit')){

            //validation
            $validator = Validator::make($request->only('category_name'),[
                'category_name' => 'required|unique:category_translations,category_name,'.$request->category_translation_id,
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $locale = Session::get('currentLocal');

            //Operation
            $this->category->update($request->category_id, $request->all());

            return response()->json(['success' => 'Data Updated Successfully']);
        }
    }

    public function active(Request $request){
        if (auth()->user()->can('category-action')){
            if ($request->ajax()){
                return $this->activeData($this->category->find($request->id));
            }
        }
    }

    public function inactive(Request $request){
        if (auth()->user()->can('category-action')){
            if ($request->ajax()){
                return $this->inactiveData($this->category->find($request->id));
            }
        }

    }

    public function bulkAction(Request $request){
        if (auth()->user()->can('category-action')){
            if ($request->ajax()) {
                return $this->bulkActionData($request->action_type, $this->category->selectedCategories($request->idsArray));
            }
        }

    }
}
