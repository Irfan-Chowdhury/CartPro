<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $menus = Menu::all();  

        if ($request->ajax())
        {
            return DataTables::of($menus)
            ->setRowId(function ($row)
            {
                return $row->id;
            })
            ->addColumn('action', function($row){

                $alert_message = "Are you sure to delete ?";
                
                $actionBtn = '<a href="'.route('admin.menu.menu_item', $row->id) .'" class="edit btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                            &nbsp;
                            <a href="'.route('admin.menu.delete', $row->id).'" class="delete btn btn-danger btn-sm" onclick="return confirm()"><i class="dripicons-trash"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.pages.menu.index',compact('menus'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->only('menu_name'),[ 
            'menu_name' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => "<b>Please fill the required Option</b>"]);
        }

        $menu = new Menu();
        $menu->menu_name =  htmlspecialchars($request->menu_name);
        $menu->is_active =  $request->is_active;
        $menu->save();

        return response()->json(['success' => '<p><b>Data Saved Successfully.</b></p>']);
    }

    public function delete($menuId)
    {
        $menu = Menu::find($menuId);
        $hasManyData = MenuItem::where('menu_id',$menuId)->get();

        if (count($hasManyData)>0) {
            foreach ($hasManyData as $item) {
                $menu_item = MenuItem::find($item->id);
                $menu_item->delete();
            }
        }
        $menu->delete();

        session()->flash('type','success');
        session()->flash('message','Successfully Deleted');
        return redirect()->back();
    }

    // public function delete(Request $request)
    // {
    //     // return response()->json($request->menu_Id);

    //     if ($request->ajax()) {
    //         $menu = Menu::find($request->menu_Id);
    //         $menu->delete();
    //         $hasManyData = MenuItem::where('menu_id',$request->menu_Id)->get();

    //         if (count($hasManyData)>0) {
    //             foreach ($hasManyData as $item) {
    //                 $menu_item = MenuItem::find($item->id);
    //                 $menu_item->delete();
    //             }
    //         }


    //         return response()->json(['success' => '<p><b>Data Deleted Successfully.</b></p>']);
    //     }
    // }
}


// <a href="javascript:void(0)" name="delete" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></a>'
