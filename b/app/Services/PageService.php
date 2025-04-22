<?php
namespace App\Services;

use App\Contracts\Page\PageContract;
use App\Contracts\Page\PageTranslationContract;
use App\Models\Page;
use App\Traits\SlugTrait;
use App\Traits\WordCheckTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PageService
{
    use SlugTrait, WordCheckTrait;


    private $pageContract;
    private $pageTranslationContract;
    public function __construct(PageContract $pageContract, PageTranslationContract $pageTranslationContract)
    {
        $this->pageContract            = $pageContract;
        $this->pageTranslationContract = $pageTranslationContract;
    }


    public function getAllPages()
    {
        $onlyActive = !$this->wordCheckInURL('online-store/pages');

        return $this->getPages($onlyActive);
    }

    public function getPages($onlyActive = false)
    {
        $query = Page::with('translations')
                ->orderBy('is_active','DESC')
                ->orderBy('id','DESC');

        if ($onlyActive) {
            $query->where('is_active', 1);
        }

        $result = $query->get()
                ->map(function($page){
                    return [
                        'id'         => $page->id,
                        'slug'       => $page->slug,
                        'is_active'  => $page->is_active,
                        'locale'     => $page->translation->locale ?? null,
                        'page_name'  => $page->translation->page_name ?? null,
                        'body'       => $page->translation->body ?? null,
                        'meta_title' => $page->translation->meta_title ?? null,
                        'meta_description' => $page->translation->meta_description ?? null,
                        'meta_url'   => $page->translation->meta_url ?? null,
                        'meta_type'  => $page->translation->meta_type ?? null,
                    ];
                });

        return json_decode(json_encode($result), FALSE);
    }

    public function dataTable()
    {
        $pages = $this->getAllPages();
        return datatables()->of($pages)
                ->setRowId(function ($row){
                    return $row->id;
                })
                ->addColumn('page_name', function ($row)
                {
                    return $row->page_name;
                })
                ->addColumn('action', function ($row)
                {
                    $actionBtn = "";
                    $url = url('/');
                    $actionBtn .= '<a target="_blank" title="View" class="btn btn-success btn-sm" href="'.$url.'/page/'.$row->slug.'"><i class="dripicons-preview"></i></a>&nbsp; ';
                    if (auth()->user()->can('page-edit'))
                    {
                        $actionBtn .= '<button type="button" title="Edit" class="edit btn btn-info btn-sm" title="Edit" data-id="'.$row->id.'"><i class="dripicons-pencil"></i></button>
                        &nbsp; ';
                    }
                    if (auth()->user()->can('page-action'))
                    {
                        if ($row->is_active==1) {
                            $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-warning btn-sm" data-id="'.$row->id.'"><i class="dripicons-thumbs-down"></i></button>';
                        }else {
                            $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="dripicons-thumbs-up"></i></button>';
                        }
                        $actionBtn .= '<button type="button" title="Delete" class="delete btn btn-danger btn-sm ml-2" data-id="'.$row->id.'"><i class="dripicons-trash"></i></button>';
                    }
                    return $actionBtn;
                })
                ->addColumn('copy_url', function ($row)
                {
                    return $row->slug;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    protected function requestHandleData($request)
    {
        $data  = [];
        $data['slug']           = $this->slug(htmlspecialchars_decode($request->page_name));
        $data['is_active']      = $request->input('is_active',0);
        $data['locale']         = Session::get('currentLocale');
        $data['page_name']      = htmlspecialchars_decode($request->page_name);
        $data['body']           = $request->body;

        $data['meta_title']     = $request->meta_title;
        $data['meta_description']= $request->meta_description;
        $data['meta_url']       = $request->meta_url;
        $data['meta_type']      = $request->meta_type;

        return $data;
    }

    public function storePage($request)
    {
        $data   = $this->requestHandleData($request);
        DB::beginTransaction();
        try{
            $page = $this->pageContract->store($data);
            $data['page_id'] = $page->id;
            $this->pageTranslationContract->store($data);
            DB::commit();
        }catch (Exception $e){
            DB::rollback();
            return response()->json(['errors' => [$e->getMessage()]], 422);
        }
        return response()->json(['success' => __('Data Successfully Saved')]);
    }

    public function findPage($id){
        return $this->pageContract->getById($id);
    }


    public function findPageTranslation($page_id)
    {
        $pageTranslation = $this->pageTranslationContract->getByIdAndLocale($page_id, session('currentLocale'));
        if (!isset($pageTranslation)) {
            $pageTranslation =  $this->pageTranslationContract->getByIdAndLocale($page_id, 'en');
        }
        return $pageTranslation;
    }

    public function updatePage($request)
    {
        $data            = $this->requestHandleData($request);
        $data['page_id'] = $request->page_id;
        $this->pageContract->update($data);
        $this->pageTranslationContract->updateOrInsert($data);
        return response()->json(['success' => 'Data Updated Successfully']);
    }

    public function activeById($id){
        return $this->pageContract->active($id);
    }

    public function inactiveById($id){
        return $this->pageContract->inactive($id);
    }

    public function destroy($id)
    {
        $this->pageContract->destroy($id);
        $this->pageTranslationContract->destroy($id);
        return response()->json(['success' => 'Data Deleted Successfully']);
    }

    public function bulkActionByTypeAndIds($type, $ids)
    {
        if ($type=='delete') {
            $this->pageContract->bulkAction($type, $ids);
            return $this->pageTranslationContract->bulkAction($type, $ids);
        }else{
            return $this->pageContract->bulkAction($type, $ids);
        }
    }

}
