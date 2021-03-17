<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Navigation;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class MenuItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index($menuId)
    {

        $categories = Category::where('is_active',1)->select('id','category_name')->get();
        $menu       = Menu::find($menuId);
        $menu_items = MenuItem::with('parentMenu')->where('menu_id',$menuId)->get();

        // $navigations = Navigation::with('parentMenu')->get();


        // if ($request->ajax())
        // {
        //     return DataTables::of($navigations)
        //     ->setRowId(function ($row)
        //     {
        //         return $row->id;
        //     })
        //     ->addColumn('parent', function ($row)
        //     {
        //         return $row->parentMenu->navigation_name ?? 'NONE';
        //     })
        //     ->addColumn('action', function($row){
        //         $actionBtn = '<a href="javascript:void(0)" name="edit" data-id="'.$row->id.'" class="edit btn btn-success btn-sm"><i class="dripicons-pencil"></i></a> 
        //                     &nbsp;
        //                     <a href="javascript:void(0)" name="delete" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></a>';
        //         return $actionBtn;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
        // }

        // return view('admin.pages.menu.menu_item.index',compact('navigations','categories'));
        return view('admin.pages.menu.menu_item.index',compact('categories','menu_items','menu'));
    }

    public function dataFetchByType(Request $request)
    {
        if ($request->type=='category') {
            $categories = Category::where('is_active',1)->select('id','category_name')->get();
            return view('admin.includes.dependancy.dependancy_category',compact('categories'));
        }
        elseif ($request->type=='page') {
            $pages = Page::where('status',1)->select('id','page_name')->get();
            return view('admin.includes.dependancy.dependancy_page',compact('pages'));
        }
        elseif ($request->type=='url') {
            return view('admin.includes.dependancy.dependancy_url');
        }
    }

    public function store(Request $request)
    {
        $menu_item = new MenuItem();
        $menu_item->menu_id     = $request->menu_id;
        $menu_item->item_name   = $request->item_name; //htmlsplashcaracter
        $menu_item->type        = $request->type; 
        $menu_item->category_id = $request->category_id; 
        $menu_item->page_id     = $request->page_id; 
        $menu_item->url         = $request->url; 
        $menu_item->icon        = $request->icon; 
        $menu_item->fluid_menu  = $request->fluid_menu; 
        $menu_item->target      = $request->target; 
        $menu_item->parent_id   = $request->parent_id; 
        $menu_item->is_active   = $request->is_active; 
        $menu_item->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $menu_item = MenuItem::find($id);
        $menu_item->delete();

        return redirect()->back();
    }
}
