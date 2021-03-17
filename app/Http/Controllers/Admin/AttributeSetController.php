<?php

namespace App\Http\Controllers\Admin;

use App\Models\AttributeSet;
use App\Models\AttributeSetTranslation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AttributeSetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $local = Session::get('currentLocal');

        $attributeSets = AttributeSet::with(['attributeSetTranslation'=> function ($query) use ($local){
            $query->where('local',$local)
            ->orWhere('local','en')
            ->orderBy('id','DESC'); 
        }])
        ->orderBy('id','DESC')
        ->get();

        if (request()->ajax())
        {
            return datatables()->of($attributeSets)
            ->setRowId(function ($row){
                return $row->id;
            })
            ->addColumn('attribute_set_name', function ($row) use ($local)
            {   
                if ($row->attributeSetTranslation->count()>0){
                    foreach ($row->attributeSetTranslation as $key => $value){
                        if ($key<1){
                            if ($value->local==$local){
                                return $value->attribute_set_name;
                            }elseif($value->local=='en'){
                                return $value->attribute_set_name;
                            }
                        }
                    }
                }else {
                    return "NULL";
                }
            })
            ->addColumn('action', function ($row)
            {
                $actionBtn = "";
                $actionBtn .= '<a href="'.route('admin.attribute_set.edit', $row->id) .'" class="edit btn btn-info btn-sm" title="Edit"><i class="dripicons-pencil"></i></a>
                            &nbsp; ';
                if ($row->is_active==1) {
                    $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-danger btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
                }else {
                    $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>';
                }
                            
                return $actionBtn;
            })
            ->rawColumns(['brand_logo','action'])
            ->make(true);
        }

        return view('admin.pages.attribute_set.index');
    }

    public function store(Request $request)
    {
        if ($request->ajax()) 
        {
            $attributeSet = new AttributeSet();
            if ($request->is_active==1) {
                $attributeSet->is_active = 1;
            }else {
                $attributeSet->is_active = 0;
            }
            $attributeSet->save();

            $attributeSetTranslation = new AttributeSetTranslation();
            $attributeSetTranslation->attribute_set_id   = $attributeSet->id;
            $attributeSetTranslation->local              = Session::get('currentLocal');
            $attributeSetTranslation->attribute_set_name = $request->attribute_set_name;
            $attributeSetTranslation->save();

            return response()->json(['success' => 'Data Saved Successfully']);
        }
    }

    public function edit($id)
    {
        $attributeSet = AttributeSet::find($id);
        $attributeSetTranslation = AttributeSetTranslation::where('attribute_set_id',$id)->where('local',Session::get('currentLocal'))->first();

        return view('admin.pages.attribute_set.edit',compact('attributeSet','attributeSetTranslation'));
    }
    
    public function update(Request $request, $id)
    {
        $attributeSet = AttributeSet::find($id);
        if ($request->is_active==1) {
            $attributeSet->is_active = 1;
        }else {
            $attributeSet->is_active = 0;
        }
        $attributeSet->update();

        DB::table('attribute_set_translations')
        ->updateOrInsert(
            [   //condition
                'attribute_set_id'  => $request->attribute_set_id,
                'local'             => Session::get('currentLocal'),
            ], 
            [   //set value
                'attribute_set_name' => $request->attribute_set_name,
            ]
        );

        session()->flash('type','success');
        session()->flash('message','Successfully Updated');
        return redirect()->back();
    }
    
    public function active(Request $request)
    {
        if ($request->ajax()) 
        {
            $attributeSet = AttributeSet::find($request->attribute_set_id);
            $attributeSet->is_active = 1;
            $attributeSet->save();

            return response()->json(['success' => 'Data Active Successfully']);
        }
    }

    public function inactive(Request $request)
    {
        if ($request->ajax()) 
        {
            $attributeSet = AttributeSet::find($request->attribute_set_id);
            $attributeSet->is_active = 0;
            $attributeSet->save();

            return response()->json(['success' => 'Data Inactive Successfully']);
        }
    }
}
