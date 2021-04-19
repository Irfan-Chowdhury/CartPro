<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\TagTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Traits\ActiveInactiveTrait;

class TagController extends Controller
{
    use ActiveInactiveTrait;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $local = Session::get('currentLocal');

        $tags = Tag::with(['tagTranslation'=> function ($query) use ($local){
            $query->where('local',$local)
            ->orWhere('local','en')
            ->orderBy('id','DESC');
        }])
        ->orderBy('is_active','DESC')
        ->orderBy('id','DESC')
        ->get();

        if (request()->ajax())
        {
            return datatables()->of($tags)
            ->setRowId(function ($row){
                return $row->id;
            })
            ->addColumn('tag_name', function ($row) use ($local)
            {
                if ($row->tagTranslation->count()>0){
                    foreach ($row->tagTranslation as $key => $value){
                        if ($key<1){
                            if ($value->local==$local){
                                return $value->tag_name;
                            }elseif($value->local=='en'){
                                return $value->tag_name;
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
                $actionBtn .= '<button type="button" title="Edit" class="edit btn btn-info btn-sm" title="Edit" data-id="'.$row->id.'"><i class="dripicons-pencil"></i></button>
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


        return view('admin.pages.tag.index');
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());

        $validator = Validator::make($request->only('tag_name'),[
            'tag_name'  => 'required|unique:tag_translations,tag_name',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->ajax())
        {
            $tag = new Tag();
            $tag->slug  = $this->make_slug($request->tag_name);
            if ($request->is_active==1) {
                $tag->is_active = 1;
            }else {
                $tag->is_active = 0;
            }
            $tag->save();

            $tagTranslation = new TagTranslation();
            $tagTranslation->tag_id   = $tag->id;
            $tagTranslation->local    = Session::get('currentLocal');
            $tagTranslation->tag_name = $request->tag_name;
            $tagTranslation->save();

            return response()->json(['success' => 'Data Saved Successfully']);
        }
    }

    public function make_slug($string) {

        if (Session::get('currentLocal')=='en') {
            $string = strtolower($string);
        }
        return preg_replace('/\s+/u', '-', trim($string));
    }

    public function edit(Request $request)
    {
        $tag = Tag::find($request->tag_id);
        $tag_name = TagTranslation::where('tag_id',$request->tag_id)
                        ->where('local',Session::get('currentLocal'))
                        ->pluck('tag_name');

        return response()->json(['tag' => $tag , 'tag_name' => $tag_name]);
    }

    public function update(Request $request) //Unique validation update later
    {
        // return response()->json($request->all());

        $validator = Validator::make($request->only('tag_name'),[
            'tag_name'  => 'required',
        ]);
        if ($validator->fails()){
            return response()->json(['error' => 'Please fill up the required field.']);
        }

        $tag = Tag::find($request->tag_id);
        if ($request->is_active==1) {
            $tag->is_active = 1;
        }else {
            $tag->is_active = 0;
        }
        $tag->update();

        DB::table('tag_translations')
        ->updateOrInsert(
            [   //condition
                'tag_id'  => $request->tag_id,
                'local'   => Session::get('currentLocal'),
            ],
            [   //set value
                'tag_name' => $request->tag_name,
            ]
        );

        return response()->json(['success' => 'Data Updated Successfully']);
    }


    public function active(Request $request){
        if ($request->ajax()){
            return $this->activeData(Tag::find($request->id));
        }
    }

    public function inactive(Request $request){
        if ($request->ajax()){
            return $this->inactiveData(Tag::find($request->id));
        }
    }
}
