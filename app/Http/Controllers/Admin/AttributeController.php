<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\AttributeTranslation;
use App\Models\AttributeSet;
// use App\Models\AttributeSetTranslation; //No
use App\Models\AttributeValue;
use App\Models\AttributeValueTranslation;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $local = Session::get('currentLocal');

        $attributes = Attribute::with(['attributeTranslation'=> function ($query) use ($local){
                    $query->where('local',$local)
                    ->orWhere('local','en')
                    ->orderBy('id','DESC'); 
                },
                'attributeSetTranslation' => function ($query) use ($local){
                    $query->where('local',$local)
                    ->orWhere('local','en')
                    ->orderBy('id','DESC'); 
                }])
                ->orderBy('id','DESC')
                ->get();

       //return $attributes;

        if (request()->ajax())
        {
            return datatables()->of($attributes)
                ->setRowId(function ($row){
                    return $row->id;
                })
                ->addColumn('attribute_name', function ($row) use ($local)
                {   
                    if ($row->attributeTranslation->count()>0){
                        foreach ($row->attributeTranslation as $key => $value){
                            if ($key<1){
                                if ($value->local==$local){
                                    return $value->attribute_name;
                                }elseif($value->local=='en'){
                                    return $value->attribute_name;
                                }
                            }
                        }
                    }else {
                        return "NULL";
                    }
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
                ->addColumn('is_filterable', function ($row){
                    if ($row->is_filterable==1) {
                        return "YES";
                    }else {
                        return "NO";
                    }
                })
                ->addColumn('action', function ($row)
                {
                    $actionBtn = "";
                    $actionBtn .= '<a href="'.route('admin.attribute.edit', $row->id) .'" class="edit btn btn-primary btn-sm" title="Edit"><i class="dripicons-pencil"></i></a>
                                    &nbsp; ';
                    if ($row->is_active==1) {
                        $actionBtn .= '<button type="button" title="Inactive" class="inactive btn btn-danger btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
                    }else {
                        $actionBtn .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="fa fa-thumbs-up"></i></button>';
                    }
                                
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.attribute.index',compact('attributes','local'));   
    }

    public function create()
    {
        $local = Session::get('currentLocal');

        $attributeSets = AttributeSet::with(['attributeSetTranslation'=> function ($query) use ($local){
            $query->where('local',$local)
            ->orWhere('local','en')
            ->orderBy('id','DESC'); 
        }])->get();

        $categories = Category::with(['categoryTranslation'=> function ($query) use ($local){
            $query->where('local',$local)
            ->orWhere('local','en')
            ->orderBy('id','DESC');
        },
        'parentCategory'
        ])
        ->get();

        return view('admin.pages.attribute.create',compact('local','attributeSets','categories'));
    }


    public function make_slug($string) {

        if (Session::get('currentLocal')=='en') {
            $string = strtolower($string);
        }
        return preg_replace('/\s+/u', '-', trim($string));
    }

    public function store(Request $request)
    {
        // $attributeValueNameArray= $request->value_name;

        // if(array_filter($attributeValueNameArray) != []){
        //     // return "Array is empty | Not Execute";
        //     return "Array is non- empty | Line Execute";
        // }
        // else {
        //     // return "Array is non- empty | Line Execute";
        //     return "Array is empty | Not Execute";
        // }

        $validator = Validator::make($request->only('attribute_set_id','attribute_name'),[ 
            'attribute_set_id'=> 'required',
            'attribute_name'  => 'required|unique:attribute_translations',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $attribute = new Attribute();
        $attribute->attribute_set_id = $request->attribute_set_id;
        // $attribute->category_id      = $request->category_id;
        $attribute->slug             = $this->make_slug($request->attribute_name);

        if ($request->is_filterable==1) {
            $attribute->is_filterable = 1;
        }else {
            $attribute->is_filterable = 0;
        }

        if ($request->is_active==1) {
            $attribute->is_active = 1;
        }else {
            $attribute->is_active = 0;
        }
        $attribute->save();

        $attributeTranslation = new AttributeTranslation();
        $attributeTranslation->attribute_id = $attribute->id;
        $attributeTranslation->local        = Session::get('currentLocal');
        $attributeTranslation->attribute_name = $request->attribute_name;
        $attributeTranslation->save();

        //----------------- Attribute-Category Sync --------------
        if (!empty($request->category_id)) {       
            $categoryArrayIds = $request->category_id;
            $attribute->categories()->sync($categoryArrayIds);
        }
        //-----------------/ Attribute-Category Sync ----------------------



        //-------- Attribute-Value ----------

        $attributeValueNameArray= $request->value_name;

        if(array_filter($attributeValueNameArray) != []){ //if value_empty it show  [null] when use return, checking that way.

            $attributeValueArray = $request->value_name;
            foreach ($attributeValueArray as $key => $value) {
                $attributeValue = new AttributeValue();
                $attributeValue->attribute_id = $attribute->id;
                $attributeValue->save();

                $attributeValueTranslation = new AttributeValueTranslation();
                $attributeValueTranslation->attribute_id = $attribute->id;
                $attributeValueTranslation->attribute_value_id = $attributeValue->id;
                $attributeValueTranslation->local        = Session::get('currentLocal');
                $attributeValueTranslation->value_name   = $attributeValueArray[$key];
                $attributeValueTranslation->save();
            }
        }
        //--------/ Attribute-Value ----------

        session()->flash('type','success');
        session()->flash('message','Data Saved Successfully.');
        
        return redirect()->back();
    }

    // public function edit($id)
    // {
    //     $attribute                 = Attribute::find($id);
    //     $attributeTranslation      = AttributeTranslation::where('attribute_id',$id)->where('local',Session::get('currentLocal'))->first();
        
    //     if (isset($attribute->attributeValue)) {
    //         $attributeValueTranslation = AttributeValueTranslation::where('attribute_value_id',$attribute->attributeValue->id)->where('local',Session::get('currentLocal'))->get();
    //         // return $attributeValueTranslation;
    //     }else {
    //         $attributeValueTranslation = NULL;
    //     }

    //     $local = Session::get('currentLocal');

    //     $attributeSets = AttributeSet::with(['attributeSetTranslation'=> function ($query) use ($local){
    //         $query->where('local',$local)
    //         ->orWhere('local','en')
    //         ->orderBy('id','DESC'); 
    //     }])->get();

    //     $categories = Category::with(['categoryTranslation'=> function ($query) use ($local){
    //         $query->where('local',$local)
    //         ->orWhere('local','en')
    //         ->orderBy('id','DESC');
    //     },
    //     'parentCategory'
    //     ])
    //     ->get();

    //     return view('admin.pages.attribute.edit',compact('attribute','attributeTranslation','attributeValueTranslation','local','attributeSets','categories'));
    // }

    public function edit($id)
    {
        $local = Session::get('currentLocal');
        // $attribute                 = Attribute::find($id);
        $attribute                 = Attribute::with('categories')->where('id',$id)->first();
        $attributeTranslation      = AttributeTranslation::where('attribute_id',$id)->where('local',Session::get('currentLocal'))->first();


        //-------- Value ---------
        $attributeValue = AttributeValue::where('attribute_id',$id)->pluck('id'); //show- attribute_values.id as [2,3,4,5]

        $attributeValueTranslation = AttributeValueTranslation::whereIn('attribute_value_id',$attributeValue)
                                                                ->where('local',$local)
                                                                ->get();
        
        if (count($attributeValueTranslation)==0) {
            $attributeValueTranslation = AttributeValueTranslation::whereIn('attribute_value_id',$attributeValue)->where('local','en')->get();
        }
        //-------- Value ---------


        //return $attribute->attributeValues->count();

        $attributeSets = AttributeSet::with(['attributeSetTranslation'=> function ($query) use ($local){
            $query->where('local',$local)
            ->orWhere('local','en')
            ->orderBy('id','DESC'); 
        }])->get();

        $categories = Category::with(['categoryTranslation'=> function ($query) use ($local){
            $query->where('local',$local)
            ->orWhere('local','en')
            ->orderBy('id','DESC');
        },
        'parentCategory'
        ])
        ->get();

        return view('admin.pages.attribute.edit',compact('attribute','attributeTranslation','attributeValueTranslation','local','attributeSets','categories'));
    }

    public function update(Request $request, $id)
    {
        // return $request->value_name;
        // return $request->add_more_value_name;
        //return $request->attribute_value_id;

        $local = Session::get('currentLocal');

        $validator = Validator::make($request->only('attribute_name'),[ 
            'attribute_name'  => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $attribute = Attribute::find($id);
        $attribute->attribute_set_id = $request->attribute_set_id;
        // $attribute->category_id      = $request->category_id;
        if ($request->is_filterable==1) {
            $attribute->is_filterable = 1;
        }else {
            $attribute->is_filterable = 0;
        }

        if ($request->is_active==1) {
            $attribute->is_active = 1;
        }else {
            $attribute->is_active = 0;
        }
        $attribute->update();

        DB::table('attribute_translations')
        ->updateOrInsert(
            [   //condition
                'attribute_id'  => $id,
                'local'         => $local,
            ], 
            [   //set value
                'attribute_name' => $request->attribute_name,
            ]
        );


        //----------------- Attribute-Category Sync --------------
        if (!empty($request->category_id)) {       
            $categoryArrayIds = $request->category_id;
            $attribute->categories()->sync($categoryArrayIds);
        }
        //-----------------/ Attribute-Category Sync ----------------------


        //--------- Value Part--------
        $attributeValueNameArray = $request->value_name;
        $attributeValueIdArray   = $request->attribute_value_id;

        //AttributeValue::where('attribute_id',$id)->whereNotIn('id',$attributeValueIdArray)->delete();
        if (empty($attributeValueNameArray)) {
            AttributeValue::where('attribute_id',$id)->delete();
        }

        if (isset($attributeValueNameArray) && isset($attributeValueIdArray)) {

            AttributeValue::where('attribute_id',$id)->whereNotIn('id',$attributeValueIdArray)->delete();

            foreach ($attributeValueNameArray as $key => $value) { //Update, Insert
                DB::table('attribute_value_translations')
                ->updateOrInsert(
                    [   //condition
                        'attribute_id'  => $id,
                        'attribute_value_id'  => $attributeValueIdArray[$key],
                        'local'               => $local,
                    ], 
                    [   //set value
                        'value_name' => $attributeValueNameArray[$key],
                    ]
                );
            }
        }

        if(isset($request->add_more_value_name)) {
            $attributeValueNameArray = $request->add_more_value_name;
            foreach ($attributeValueNameArray as $key => $value) {
                $attributeValue = new AttributeValue();
                $attributeValue->attribute_id =  $id;
                $attributeValue->save();

                $attributeValueTranslation  = new AttributeValueTranslation();
                $attributeValueTranslation->attribute_id       = $attribute->id;
                $attributeValueTranslation->attribute_value_id = $attributeValue->id;
                $attributeValueTranslation->local              = $local;
                $attributeValueTranslation->value_name         = $attributeValueNameArray[$key];
                $attributeValueTranslation->save();
            }
        }

        //--------- Value Part--------

        session()->flash('type','success');
        session()->flash('message','Successfully Updated');
        return redirect()->back();
    }

    public function active(Request $request)
    {
        if ($request->ajax()) 
        {
            $attribute = Attribute::find($request->attribute_id);
            $attribute->is_active = 1;
            $attribute->save();

            return response()->json(['success' => 'Data Active Successfully']);
        }
    }

    public function inactive(Request $request)
    {
        if ($request->ajax()) 
        {
            $attribute = Attribute::find($request->attribute_id);
            $attribute->is_active = 0;
            $attribute->save();

            return response()->json(['success' => 'Data Inactive Successfully']);
        }
    }


    public function getAttributeValues(Request $request)
    {
        $attribute = Attribute::find($request->attribute_id);
        
        if (isset($attribute->attributeValue)) {
            // $attributeValueTranslation = AttributeValueTranslation::where('attribute_value_id',$attribute->attributeValue->id)->where('local',Session::get('currentLocal'))->get();
            $attributeValueTranslation = AttributeValueTranslation::where('attribute_id',$request->attribute_id)->where('local',Session::get('currentLocal'))->get();
        }else {
            $attributeValueTranslation = NULL;
        }

        //return response()->json($request->attribute_id);

        $output = '';
		foreach ($attributeValueTranslation as $row)
		{
			$output .= '<option value=' . $row->attribute_value_id . '>' . $row->value_name . '</option>';
		}

        return response()->json($output);
    }

}




//-------- Value ---------




        
        //$attributeValue = AttributeValue::where('attribute_id',$id)->pluck('id'); //show- attribute_values.id [2,3,4,5]
        // $attributeValue = AttributeValue::where('attribute_id',$id)->select('id')->get(); //show- attribute_values.id [ {id:2}, {id:3}, {id:4}, {id:5} ]
        // return $attributeValue[0]->attribute_id;
        //return $attributeValue; // id = 2,3,4,5


        //----Previous---
            // $attributeValue = AttributeValue::where('attribute_id',$id)->get();
            // $attributeValueTranslation = [];
            // if (isset($attributeValue)) {
            //     foreach ($attributeValue as $key => $item) {
            //         $attributeValueTranslation[$key] = AttributeValueTranslation::where('attribute_value_id',$item->id)
            //                                             ->where('local',Session::get('currentLocal'))
            //                                             ->get();
            //     }
            // }else {
            //     $attributeValueTranslation = NULL;
            // }

            // return $attributeValueTranslation;
        //----Previous---


        // return count($attributeValueTranslation);
        // return $attributeValueTranslation[1][0]->value_name; //ok

        //-------- Value ---------


//Edit Blade
// <input type="text" name="value_name[]" required class="form-control" value="{{$attributeValueTranslation[$key][0]->value_name}}">
//                                                         <input type="hidden" name="attribute_value_id[]" required class="form-control" value="{{$attributeValueTranslation[$key][0]->attribute_value_id}}">





// if ($request->value_name && $request->attribute_value_id) {

        //     $attributeValueNameArray = $request->value_name;

        //     // AttributeValueTranslation::where('attribute_value_id',$attribute->attributeValue->id)
        //     //                         ->where('local',Session::get('currentLocal'))
        //     //                         ->whereNotIn('value_name',$attributeValueNameArray)
        //     //                         // ->update(['value_name'=>$attributeValueNameArray]);
        //     //                         ->delete();

        //     foreach ($attributeValueNameArray as $key => $value) {
        //         DB::table('attribute_value_translations')
        //         ->updateOrInsert(
        //             [   //condition
        //                 'attribute_value_id'  => $attribute->attributeValue->id,
        //                 'local'     => Session::get('currentLocal'),
        //                 // 'value_name' => $attributeValueNameArray[$key],
        //             ], 
        //             [   //set value
        //                 'value_name' => $attributeValueNameArray[$key],
        //             ]
        //         );
        //     }
        // }