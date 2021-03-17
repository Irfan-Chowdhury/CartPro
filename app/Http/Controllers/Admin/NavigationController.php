<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class NavigationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        // $navigations = Navigation::with('childs','page')
        //             ->where('is_active',1)
        //             ->where('parent_id',NULL)
        //             ->get();
        // return $navigations;

        $categories = Category::where('is_active',1)->select('id','category_name')->get();

        $navigations = Navigation::with('parentMenu')->get();

        if ($request->ajax())
        {
            return DataTables::of($navigations)
            ->setRowId(function ($row)
            {
                return $row->id;
            })
            ->addColumn('parent', function ($row)
            {
                return $row->parentMenu->navigation_name ?? 'NONE';
            })
            ->addColumn('action', function($row){
                $actionBtn = '<a href="javascript:void(0)" name="edit" data-id="'.$row->id.'" class="edit btn btn-success btn-sm"><i class="dripicons-pencil"></i></a> 
                            &nbsp;
                            <a href="javascript:void(0)" name="delete" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.pages.menu.navigation.index',compact('navigations','categories'));
    }

    public function dataFetchByType(Request $request)
    {
        if ($request->type=='category') {
            $categories = Category::where('is_active',1)->select('id','category_name')->get();
            return view('admin.pages.menu.navigation.dependancy_category',compact('categories'));
        }
        elseif ($request->type=='page') {
            $pages = Page::where('status',1)->select('id','page_name')->get();
            return view('admin.pages.menu.navigation.dependancy_page',compact('pages'));
        }
        elseif ($request->type=='url') {
            return view('admin.pages.menu.navigation.dependancy_url');
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->only('navigation_name','type'),[ 
            'navigation_name' => 'required',
            'type'            => 'required'
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => "<b>Please fill the required Option</b>"]);
        }

        if (request()->ajax())
        {
            $navigation = new Navigation();
            $navigation->navigation_name = $request->navigation_name;
            $navigation->type            = $request->type;
            $navigation->category_id     = $request->category_id;
            $navigation->page_id         = $request->page_id;
            $navigation->url             = $request->url;
            $navigation->target          = $request->target;
            $navigation->parent_id       = $request->parent_id;
            $navigation->is_active       = $request->is_active;
            $navigation->save();
        }

        return response()->json(['success' => '<p><b>Data Saved Successfully.</b></p>']);
    }

    public function delete(Request $request)
    {
        if (request()->ajax())
        {
            $navigation = Navigation::find($request->navigation_id);
            $navigation->delete();

            return response()->json(['success' => '<p><b>Data Deleted Successfully.</b></p>']);
        }
    }

    public function deleteCheckbox(Request $request)
    {
        if ($request->ajax()) 
        {
            $all_id   = $request->all_checkbox_id;
            $total_id = count($all_id);
            for ($i=0; $i < $total_id; $i++) { 
                $data = Navigation::find($all_id[$i]);
                $data->delete();
            }

            return response()->json(['success' => '<p><b>Data Deleted Successfully.</b></p>']);
        }
    }




}
//606-005-267468-72DE