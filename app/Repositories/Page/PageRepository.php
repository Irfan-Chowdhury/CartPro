<?php

namespace App\Repositories\Page;

use App\Contracts\Page\PageContract;
use App\Models\Page;
use App\Traits\ActiveInactiveTrait;
use App\Traits\TranslationTrait;
use Illuminate\Support\Facades\DB;

class PageRepository implements PageContract
{
    use TranslationTrait, ActiveInactiveTrait;

    public function getAll()
    {
        $data = Page::with('translations')
                ->orderBy('is_active','DESC')
                ->orderBy('id','DESC')
                ->get()
                ->map(function($page){
                    return [
                        'id'         =>$page->id,
                        'slug'       => $page->slug,
                        'is_active'  =>$page->is_active,
                        'locale'     => $page->translation->locale ?? null,
                        'page_name'  => $page->translation->page_name ?? null,
                        'body'       => $page->translation->body ?? null,
                        'meta_title' => $page->translation->meta_title ?? null,
                        'meta_description' => $page->translation->meta_description ?? null,
                        'meta_url'   => $page->translation->meta_url ?? null,
                        'meta_type'  => $page->translation->meta_type ?? null,
                    ];
                });

        return json_decode(json_encode($data), FALSE);
    }

    public function store($data){
        return Page::create($data);
    }

    public function getById($id){
        return Page::find($id);
    }

    public function update($data){
        return $this->getById($data['page_id'])->update($data);
    }

    public function active($id){
        return $this->activeData($this->getById($id));
    }

    public function inactive($id){
        return $this->inactiveData($this->getById($id));
    }

    public function destroy($id){
        $this->getById($id)->delete();
    }

    public function bulkAction($type, $ids){
        return $this->bulkActionData($type, Page::whereIn('id',$ids));
    }


}
