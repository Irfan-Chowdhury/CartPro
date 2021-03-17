<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $language = Language::where('default',1)->first();
        $currentActiveLocal = $language->local;
        
        $categories = Category::with(['categoryTranslation'=> function ($query) use ($currentActiveLocal){
                    $query->where('local',$currentActiveLocal)
                    ->orWhere('local','en')
                    ->orderBy('id','DESC');
                },
                'parentCategory'
                ])
                // ->where('is_active',1)
                ->get();
            
        // $categories = Category::with('parentCategory')->get();
    //    return $categories;
        // return view('admin.pages.category.index2',compact('categories','currentActiveLocal'));


        //Check Later
        if (request()->ajax())
            {
                
                return datatables()->of($categories)
                    ->setRowId(function ($category)
                    {
                        return $category->id;
                    })
                    ->addColumn('category_name', function ($row) use ($currentActiveLocal)
                    {   
                        if ($row->categoryTranslation->count()>0){
                            foreach ($row->categoryTranslation as $key => $value){
                                if ($key<1){
                                    if ($value->local==$currentActiveLocal){
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
                    ->addColumn('parent', function ($row) use ($currentActiveLocal)
                    {
                        if ($row->categoryTranslation->count()>0){
                            if($row->parentCategory==NULL){
                                return "NULL";
                            }else{
                                $data = CategoryTranslation::where('category_id',$row->parentCategory->id)->where('local',$currentActiveLocal)->first();
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
                                return '<span class="p-2 badge badge-success">Active</span>';
                            }else{
                                return '<span class="p-2 badge badge-dark">Inactive</span>';
                            }
                        }else {
                            return "NULL";
                        }
                    })
                    ->addColumn('action', function ($row)
                    {
                        if ($row->categoryTranslation->count()>0){
                            $actionBtn = '<a href="'.route('admin.category.edit', $row->id) .'" class="edit btn btn-success btn-sm" title="Edit"><i class="dripicons-pencil"></i></a>
                                    &nbsp;
                                    <a href="'.route('admin.category.delete', $row->id).'" class="delete_test btn btn-danger btn-sm"><i class="dripicons-trash"></i></a>';
                            return $actionBtn;
                        }else {
                            return "NULL &nbsp; NULL";
                        }
                        
                    })
                    ->rawColumns(['is_active','action'])
                    ->make(true);
            }
            return view('admin.pages.category.index',compact('categories','currentActiveLocal'));
    }
    
    public function make_slug($string) {
        return preg_replace('/\s+/u', '-', trim($string));
    }
    
    public function store(Request $request)
    {
        // return 'ok';
        // dd($request->parent);
        $category = new Category;
        $category->slug =  $this->make_slug($request->category_name);

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

        $language = Language::where('default',1)->first();
        $crandTranslation                = new CategoryTranslation();
        $crandTranslation->category_id   = $category->id;
        $crandTranslation->local         = $language->local;
        $crandTranslation->category_name = $request->category_name;
        $crandTranslation->save();

        // return response()->json($category);    
        return redirect()->back();

        return response()->json(['success' => __('success')]);
        
        
    }
   
    public function show($id)
    {
        $Category = Category::where('id',$id)->first();
        return Response()->json($Category);
    }



    public function categoryEdit($id)
    {
        if (request()->ajax())
        {
            $data = Category::findOrFail($id);

            return response()->json(['data' => $data]);
        } 
    }

    public function edit($id)
    {
        $language = Language::where('default',1)->first();
        $category = Category::find($id);
        $categoryTranslation = CategoryTranslation::where('category_id',$id)->where('local',$language->local)->first();

        return view('admin.pages.category.edit',compact('category','categoryTranslation','language'));
    }
    

   
    public function categoryUpdate(Request $request)
    {
        // $id = $request->hidden_id;
        // $data = [];
        // $data['category_name'] = htmlspecialchars($request->category_name);
        // $data['description'] = htmlspecialchars($request->description);
        // $data['parent'] = $request->parent;
        // $data['description_position'] =$request->description_position;
        // $image = $request->file('image');
        // if ($image) {
        //     $image_name = Str::random(8);
        //     $ext = strtolower($image->getClientOriginalExtension());
        //     $image_full_name = $image_name.'.'.$ext;
        //     $upload_path = 'public/images/';
        //     $image_url = $upload_path.$image_full_name;
        //     $success = $image->move($upload_path,$image_full_name);
        //     $data['image'] = $image_url;
        // }

        // $data['featured'] = $request->featured;
        // if ($request->featured == null) {
        //     $data['featured'] = 0;
        // }
        // else 
        // {
        //     $data['featured'] = 1;
        // }
        // $data['status'] = 1;
        // //return response()->json($data);
        // Category::whereId($id)->update($data);

        // return response()->json(['success' => __('updated')]); 
    }


    public function update(Request $request)
    {
        DB::table('category_translations')
        ->updateOrInsert(
            [
                'category_id' => $request->category_id,
                'local'       => $request->local,
            ], //condition
            [
                'category_name' => $request->category_name,
            ]
        );

        session()->flash('type','success');
        session()->flash('message','Successfully Updated');
        return redirect()->back();
    }

    // public function destroy($id)
    // {
    //     Category::where('id',$id)->update(['is_active'=>0]);

    //     return response()->json(['success' => __('Data is successfully deleted')]);
    // }
    public function delete($id)
    {
        Category::where('id',$id)->update(['is_active'=>0]);

        session()->flash('type','success');
        session()->flash('message','Successfully Deleted');
        return redirect()->back();

        return response()->json(['success' => __('Data is successfully deleted')]);
    }

    function delete_by_selection(Request $request)
    {
        
            $category_id = $request['CategoryListIdArray'];
            $categories = Category::whereIn('id', $category_id);
            if ($categories->delete())
            {
                return response()->json(['success' => __('Multi Delete', ['key' => trans('file.Account')])]);
            } else
            {
                return response()->json(['error' => 'Error,selected Accounts can not be deleted']);
            }
        

       
    }

    public function status($id,$status)
    {
        //echo "string";
        //return $status;
        Category::where('id',$id)->update(['status'=>$status]);
        return response()->json(['success' => _('updates')]);
    }


     public function parentLoad()
    {
        $Category = Category::all();

        return response()->json(['success' => _('updates'),'data'=>$Category]);
    }
   
}
