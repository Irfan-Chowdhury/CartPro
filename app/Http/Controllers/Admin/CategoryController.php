<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    //in blade - category_icon --> icon || Ajax

    private $categoryService;
    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        if (auth()->user()->can('category-view')){
            $categories =  $this->categoryService->getAllCategories();
            if (request()->ajax()){
                return $this->categoryService->dataTable();
            }
            return view('admin.pages.category.index',compact('categories'));
        }
        return abort('403', __('You are not authorized'));
    }

    public function store(CategoryStoreRequest $request)
    {
        if (auth()->user()->can('category-store')){
            $this->categoryService->storeCategory($request);
            return response()->json(['success' => __('Data Successfully Saved')]);
        }
    }

    public function edit(Request $request)
    {
        $category             = $this->categoryService->findCategory($request->category_id);
        $categoryTranslation  = $this->categoryService->findCategoryTranslation($request->category_id);
        return response()->json(['category'=>$category, 'categoryTranslation'=>$categoryTranslation]);
    }

    public function update(CategoryUpdateRequest $request)
    {
        if (auth()->user()->can('category-edit')){
            $this->categoryService->updateCategory($request);
            return response()->json(['success' => 'Data Updated Successfully']);
        }
    }

    public function active(Request $request){
        if (auth()->user()->can('category-action')){
            if ($request->ajax()){
                return $this->categoryService->activeById($request->id);
            }
        }
    }

    public function inactive(Request $request){
        if (auth()->user()->can('category-action')){
            if ($request->ajax()){
                return $this->categoryService->inactiveById($request->id);
            }
        }
    }

    public function bulkAction(Request $request){
        if (auth()->user()->can('category-action')){
            if ($request->ajax()) {
                return $this->categoryService->bulkActionByTypeAndIds($request->action_type, $request->idsArray);
            }
        }
    }

    public function delete(Request $request)
    {
        if (auth()->user()->can('category-action')){
            if ($request->ajax()) {
                return $this->categoryService->destroy($request->id);
            }
        }
    }
}






        //--------- Test  -----------
        // $categories = Category::with('categoryTranslations')
        //     ->get();
        // $data = [];
        // foreach ($categories as $key => $value) {
        //     $data[$key]['slug']  = $value->slug;
        //     $data[$key]['local'] = $this->translations($value->categoryTranslations)->local;
        //     $data[$key]['category_name'] = $this->translations($value->categoryTranslations)->category_name;
        // }
        // return $data;
        // return $this->translations($category->categoryTranslation);

        //Trait
        // namespace App\Trait;
        // trait Residence{
        // }

        // //Class
        // namespace App\Controller;
        // use App\Trait\Residence;
        // Class TraitClassForBlade{
        //     use Residence;
        // }

        // //Blade
        // @inject('Residence','App\Controller\TraitClassForBlade')
        // @foreach($residence->country as $country)
        // @endforeach
        //--------- Test  -----------
