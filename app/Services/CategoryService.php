<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Category\CategoryContract;
use App\Contracts\Category\CategoryTranslationContract;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Traits\WordCheckTrait;
use App\Traits\imageHandleTrait;
use App\Traits\SlugTrait;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Services\StatusHandlerService;
use Illuminate\Support\Facades\Storage;

class CategoryService extends StatusHandlerService
{
    use SlugTrait, imageHandleTrait, WordCheckTrait;

    private $categoryContract;
    private $categoryTranslationContract;

    private static $directory = 'uploads/images/categories/';

    private static $type = 'category';

    public function __construct(CategoryContract $categoryContract, CategoryTranslationContract $categoryTranslationContract)
    {
        $this->categoryContract            = $categoryContract;
        $this->categoryTranslationContract = $categoryTranslationContract;
    }

    public function getAllCategories()
    {
        $query = Category::with(['translations','parentCategory'])
            ->orderBy('is_active','DESC')
            ->orderBy('id','DESC');


        // if (request()->routeIs('specific.route.name')) {
        if (!$this->wordCheckInURL('categories')) {
            $query->where('is_active', 1);
        }

        $categories = $query->get()
                            ->map(function($category) {
                                return [
                                    'id'=> $category->id,
                                    'image'=> $category->image,
                                    'is_active'=> $category->is_active,
                                    'category_name'=> $category->translation->category_name,
                                    'parent_category_name'=> $category->parentTranslation->category_name ?? 'NONE',
                                ];
                            });

        return json_decode(json_encode($categories), FALSE);
    }

    public function dataTable()
    {
        $categories = self::getAllCategories();

        if (request()->ajax()){

            return datatables()->of($categories)
                    ->setRowId(function ($category){
                        return $category->id;
                    })
                    ->addColumn('category_image', function ($row){
                        if ($row->image==null) {
                            return '<img src="'.url("images/empty.jpg").'" alt="" height="50px" width="50px">';
                        }
                        else {
                            // if (!File::exists(public_path("storage/{$row->image}"))) {
                            if (!Storage::disk('public')->exists($row->image)) {
                                $url = 'https://dummyimage.com/50x50/000000/0f6954.png&text=Category';
                            }else {
                                $url = url("storage/{$row->image}");
                            }
                            return  '<img src="'. $url .'" height="50px" width="50px"/>';
                        }
                    })
                    ->addColumn('category_name', function ($row){
                        return $row->category_name;
                    })
                    ->addColumn('parent', function ($row){
                        return $row->parent_category_name;
                    })
                    ->addColumn('is_active', function ($row){
                        if($row->is_active==1){
                            return '<span class="p-2 badge badge-success">Active</span>';
                        }else{
                            return '<span class="p-2 badge badge-danger">Inactive</span>';
                        }
                    })
                    ->addColumn('action', function ($row){
                        $actionBtn = "";
                        if (auth()->user()->can('category-edit')){
                            $actionBtn .= '<button type="button" title="Edit" class="edit btn btn-info btn-sm" title="Edit" data-id="'.$row->id.'"><i class="dripicons-pencil"></i></button>
                                            &nbsp; ';
                        }
                        if (auth()->user()->can('category-action')){
                            if ($row->is_active==1) {
                                $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-warning btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
                            }else {
                                $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>';
                            }
                            $actionBtn .= '<button type="button" title="Delete" class="delete btn btn-danger btn-sm ml-2" title="Edit" data-id="'.$row->id.'"><i class="dripicons-trash"></i></button>
                            &nbsp; ';
                        }
                        return $actionBtn;
                    })
                    ->rawColumns(['is_active','action','category_image'])
                    ->make(true);
        }
    }

    public function storeCategory($request)
    {
        DB::beginTransaction();
        try {

            $data = $this->requestHandleData($request);

            $category = Category::create($data);

            CategoryTranslation::create([
                'category_id' => $category->id,
                'locale' => session('currentLocale'),
                'category_name' => htmlspecialchars_decode($request->category_name),
            ]);

            DB::commit();

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception($e->getMessage());
        }
    }

    public function findCategory(int $id)
    {
        try {
            $category = Category::with('translations')->findOrFail($id);

            return new CategoryResource($category);

        } catch (Exception $e) {

            throw new Exception($e->getMessage());
        }
    }

    public function updateCategory($request)
    {
        DB::beginTransaction();
        try {

            $category = $this->findCategory((int)$request->category_id);

            $requesteData = $this->requestHandleData($request, $category);

            Category::whereId($request->category_id)->update($requesteData);

            CategoryTranslation::updateOrCreate(
                [
                    'category_id' => $request->category_id,
                    'locale' => session('currentLocale'),
                ],
                [
                    'category_name' => htmlspecialchars_decode($request->category_name),
                ]
            );

            DB::commit();

        } catch (Exception $e) {

            DB::rollBack();

            throw new Exception($e->getMessage());
        }
    }


    public function requestHandleData($request, $category = null){
        $data              = [];
        $data['slug']      = $this->slug(htmlspecialchars_decode($request->category_name));
        $data['parent_id'] = ($request->parent_id==true) ? $request->parent_id : null;
        $data['icon']      = ($request->icon==true) ? $request->icon : null;
        $data['top']       = ($request->top==true) ? $request->top : 0;
        $data['is_active'] = ($request->is_active==true) ? $request->is_active : 0;
        if ($request->image) {
            if ($category) {
                $this->previousImageDelete($category->image);
            }
            $data['image'] = $this->imageStore($request->image, self::$directory, 300, 300);
        }
        return $data;
    }


    public function activeById(int $id): void
    {
        $this->activeData(Category::findOrFail($id));

    }

    public function inactiveById(int $id): void
    {
        $this->inactiveData(Category::findOrFail($id));
    }



    public function destroy($categoryId): void
    {
        $category = Category::findOrFail($categoryId);
        $this->previousImageDelete($category->image);
        $category->delete();
    }

    public function bulkActionByTypeAndIds(string $type, array $ids)
    {
        return $this->bulkActionData($type, Category::whereIn('id',$ids));

    }
}

