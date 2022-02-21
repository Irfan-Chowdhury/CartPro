<?php

namespace App\Http\Controllers\Admin;

use App\Models\AttributeSet;
use App\Models\AttributeSetTranslation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Traits\ActiveInactiveTrait;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class AttributeSetController extends Controller
{
    use ActiveInactiveTrait;

    public function index()
    {
        if (auth()->user()->can('attribute_set-view'))
        {
            $locale = Session::get('currentLocal');
            App::setLocale($locale);


            $attributeSets = AttributeSet::with('attributeSetTranslation','attributeSetTranslationEnglish')
                            ->orderBy('is_active','DESC')
                            ->orderBy('id','DESC')
                            ->get();

            if (request()->ajax())
            {
                return datatables()->of($attributeSets)
                ->setRowId(function ($row){
                    return $row->id;
                })
                ->addColumn('attribute_set_name', function ($row) use ($locale)
                {
                    return $row->attributeSetTranslation->attribute_set_name ?? $row->attributeSetTranslationEnglish->attribute_set_name ?? null;
                })
                ->addColumn('action', function ($row)
                {
                    $actionBtn = "";
                    if (auth()->user()->can('attribute_set-edit'))
                    {
                        $actionBtn .= '<button type="button" title="Edit" class="edit btn btn-info btn-sm" title="Edit" data-id="'.$row->id.'"><i class="dripicons-pencil"></i></button>
                                &nbsp; ';
                    }
                    if (auth()->user()->can('attribute_set-action'))
                    {
                        if ($row->is_active==1) {
                            $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-danger btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
                        }else {
                            $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>';
                        }
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
            return view('admin.pages.attribute_set.index');
        }
        return abort('403', __('You are not authorized'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->can('attribute_set-store'))
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


    }

    public function edit(Request $request)
    {
        $attributeSet = AttributeSet::find($request->attribute_set_id);
        $attributeSetTranslation = AttributeSetTranslation::where('attribute_set_id',$request->attribute_set_id)->where('locale',Session::get('currentLocal'))->first();
        if (!isset($attributeSetTranslation)) {
            $attributeSetTranslation = AttributeSetTranslation::where('attribute_set_id',$request->attribute_set_id)->where('locale','en')->first();
        }

        return response()->json(['attributeSet'=>$attributeSet, 'attributeSetTranslation'=>$attributeSetTranslation]);

        return view('admin.pages.attribute_set.edit',compact('attributeSet','attributeSetTranslation'));
    }

    public function update(Request $request)
    {
        if (auth()->user()->can('attribute_set-edit'))
        {
            if ($request->ajax()) {

                $validator = Validator::make($request->only('attribute_set_name'),[
                    'attribute_set_name'  => 'required|unique:attribute_set_translations,attribute_set_name,'.$request->attribute_set_id,
                ]);
                if ($validator->fails()){
                    return response()->json(['error' => 'Please fill up the required field.']);
                }

                $attributeSet = AttributeSet::find($request->attribute_set_id);
                if ($request->is_active==1) {
                    $attributeSet->is_active = 1;
                }else {
                    $attributeSet->is_active = 0;
                }
                $attributeSet->update();

                DB::table('attribute_set_translations')
                ->updateOrInsert(
                    [
                        'attribute_set_id'  => $request->attribute_set_id,
                        'locale'             => Session::get('currentLocal'),
                    ],
                    [
                        'attribute_set_name' => $request->attribute_set_name,
                    ]
                );

                return response()->json(['success' => 'Data Updated Successfully']);
            }
        }
        return abort('403', __('You are not authorized'));
    }


    public function active(Request $request){
        if ($request->ajax()){
            return $this->activeData(AttributeSet::find($request->id));
        }
    }

    public function inactive(Request $request){
        if ($request->ajax()){
            return $this->inactiveData(AttributeSet::find($request->id));
        }
    }

    public function bulkAction(Request $request)
    {
        if ($request->ajax()) {
            return $this->bulkActionData($request->action_type, AttributeSet::whereIn('id',$request->idsArray));
        }
    }
}
