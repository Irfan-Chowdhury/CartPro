<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Traits\ActiveInactiveTrait;
use App\Traits\SlugTrait;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
    use ActiveInactiveTrait, SlugTrait;

    public function index()
    {
        App::setLocale(Session::get('currentLocal'));

        if (auth()->user()->can('category-view'))
        {
            $local = Session::get('currentLocal');
            $currentActiveLocal = $local;

            $categories = Category::with(['categoryTranslation'=> function ($query) use ($currentActiveLocal){
                        $query->where('local',$currentActiveLocal)
                        ->orWhere('local','en')
                        ->orderBy('id','DESC');
                    },
                    'parentCategory'
                    ])
                    ->orderBy('is_active','DESC')
                    ->orderBy('id','DESC')
                    ->get();


            //Check Later
            if (request()->ajax())
            {
                return datatables()->of($categories)
                    ->setRowId(function ($category)
                    {
                        return $category->id;
                    })
                    ->addColumn('category_name', function ($row) use ($local)
                    {
                        if ($row->categoryTranslation->count()>0){
                            foreach ($row->categoryTranslation as $key => $value){
                                if ($key<1){
                                    if ($value->local==$local){
                                        return $value->category_name;
                                    }elseif($value->local=='en'){
                                        return $value->category_name;
                                    }
                                }
                            }
                        }else {
                            return "NULL";
                        }
                    })
                    ->addColumn('parent', function ($row) use ($local)
                    {
                        if ($row->categoryTranslation->count()>0){
                            if($row->parentCategory==NULL){
                                return "NONE";
                            }else{
                                $data = CategoryTranslation::where('category_id',$row->parentCategory->id)->where('local',$local)->first();
                                if (empty($data)) {
                                    $data = CategoryTranslation::where('category_id',$row->parentCategory->id)->where('local','en')->first();
                                }
                                return $data->category_name;
                            }
                        }else {
                            return "NULL";
                        }
                    })
                    ->addColumn('is_active', function ($row)
                    {
                        if ($row->categoryTranslation->count()>0){
                            if($row->is_active==1){
                                return '<span class="p-2 badge badge-success"></span>';
                            }else{
                                return '<span class="p-2 badge badge-danger">Inactive</span>';
                            }
                        }else {
                            return "NULL";
                        }
                    })
                    ->addColumn('action', function ($row)
                    {
                        // $actionBtn .= '<a href="'.route('admin.category.edit', $row->id) .'" class="edit btn btn-primary btn-sm" title="Edit"><i class="dripicons-pencil"></i></a>
                        //                 &nbsp; ';
                        $actionBtn = "";
                        if (auth()->user()->can('category-edit'))
                        {
                            $actionBtn .= '<button type="button" title="Edit" class="edit btn btn-info btn-sm" title="Edit" data-id="'.$row->id.'"><i class="dripicons-pencil"></i></button>
                                            &nbsp; ';
                        }
                        if (auth()->user()->can('category-action'))
                        {
                            if ($row->is_active==1) {
                                $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-danger btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
                            }else {
                                $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>';
                            }
                        }
                        return $actionBtn;

                    })
                    ->rawColumns(['is_active','action'])
                    ->make(true);
            }
            return view('admin.pages.category.index',compact('categories','currentActiveLocal'));
        }
        return abort('403', __('You are not authorized'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->can('category-store'))
        {
            $local = Session::get('currentLocal');

            $validator = Validator::make($request->only('category_name'),[
                'category_name' => 'required|unique:category_translations,category_name',
            ]);

            if ($validator->fails())
            {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $category = new Category;
            $category->slug =  $this->slug($request->category_name);
            $category->parent_id = $request->parent_id;
            $category->description = htmlspecialchars($request->description);
            $category->description_position = $request->description_position;
            $image = $request->file('image');
            if ($image) {
                $image_name = Str::random(8);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/images/';
                $image_url = $upload_path.$image_full_name;
                $success = $image->move($upload_path,$image_full_name);
                $category->image = $image_url;
            }
            if ($request->featured == null) {
                $category->featured = 0;
            }
            else
            {
                $category->featured = 1;
            }

            if (empty($request->is_active)) {
                $category->is_active = 0;
            }else {
                $category->is_active = 1;
            }
            $category->save();

            $crandTranslation                = new CategoryTranslation();
            $crandTranslation->category_id   = $category->id;
            $crandTranslation->local         = $local;
            $crandTranslation->category_name = $request->category_name;
            $crandTranslation->save();

            return response()->json(['success' => __('Data Successfully Saved')]);
        }
    }

    public function edit(Request $request)
    {
        $local = Session::get('currentLocal');

        $category = Category::find($request->category_id);
        $categoryTranslation = CategoryTranslation::where('category_id',$request->category_id)->where('local',$local)->first();

        return response()->json(['category'=>$category, 'categoryTranslation'=>$categoryTranslation]);

        return view('admin.pages.category.edit',compact('category','categoryTranslation','local'));
    }


    public function update(Request $request)
    {
        if (auth()->user()->can('category-edit'))
        {
            $validator = Validator::make($request->only('category_name'),[
                'category_name' => 'required|unique:category_translations,category_name,'.$request->category_translation_id,
            ]);

            if ($validator->fails())
            {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $local = Session::get('currentLocal');

            $category = Category::find($request->category_id);
            $category->parent_id   = $request->parent_id;
            $category->description = $request->description;
            $category->description_position = $request->description_position;
            $category->featured    = $request->featured;
            $category->is_active   = $request->is_active;
            $category->update();

            DB::table('category_translations')
            ->updateOrInsert(
                [
                    'category_id' => $request->category_id,
                    'local'       =>  $local,
                ], //condition
                [
                    'category_name' => $request->category_name,
                ]
            );

            return response()->json(['success' => 'Data Saved Successfully']);

            session()->flash('type','success');
            session()->flash('message','Successfully Updated');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        Category::where('id',$id)->update(['is_active'=>0]);

        session()->flash('type','success');
        session()->flash('message','Successfully Deleted');
        return redirect()->back();

        return response()->json(['success' => __('Data is successfully deleted')]);
    }

    public function active(Request $request){
        if (auth()->user()->can('category-action'))
        {
            if ($request->ajax()){
                return $this->activeData(Category::find($request->id));
            }
        }
    }

    public function inactive(Request $request){
        if (auth()->user()->can('category-action'))
        {
            if ($request->ajax()){
                return $this->inactiveData(Category::find($request->id));
            }
        }

    }

    public function bulkAction(Request $request)
    {
        if (auth()->user()->can('category-action'))
        {
            if ($request->ajax()) {
                return $this->bulkActionData($request->action_type, Category::whereIn('id',$request->idsArray));
            }
        }

    }

    // function delete_by_selection(Request $request)
    // {

    //         $category_id = $request['CategoryListIdArray'];
    //         $categories = Category::whereIn('id', $category_id);
    //         if ($categories->delete())
    //         {
    //             return response()->json(['success' => __('Multi Delete', ['key' => trans('file.Account')])]);
    //         } else
    //         {
    //             return response()->json(['error' => 'Error,selected Accounts can not be deleted']);
    //         }
    // }
}
