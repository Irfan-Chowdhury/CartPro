<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use Str;

class CollectionController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $collection = Collection::all();
       if (request()->ajax())
            {
                $collection = Collection::oldest()->get();
                return datatables()->of($collection)
                    ->setRowId(function ($collection)
                    {
                        return $collection->id;
                    })
                    // ->addColumn('name', function ($row)
                    // {
                    //     $button = '<h6>'.$row->name . '</h6>';

                    //     return $button;
                    // })
                    ->addColumn('action', function ($data)
                    {
                        $button = '';
                       
                        $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i></button>';
                        $button .= '&nbsp;&nbsp;';
                        
                         $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';

                         $button .= '&nbsp;&nbsp;';
                         if ($data->status == 0) {
                                $button .= '<button  href="" name="active" data-id="' . $data->id . '" data-status="1" class="btn btn-success btn-sm status"><i class="dripicons-thumbs-up"></i></button>';
                            }else{
                                $button .= '<button href=""  name="inactive" data-id="' . $data->id . '" data-status="0" class=" btn btn-danger btn-sm status"><i class="dripicons-thumbs-down"></i></button>';
                            }   
                         
                        

                        return $button;
                    })
                    ->
                    rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.pages.allCollection',compact('collection'));
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.createBrand');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $collection = new Collection;
        $collection->name = htmlspecialchars($request->name);
        $image = $request->file('image');
        if ($image) {
            $image_name = Str::random(8);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/images/collections/';
            //$image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $collection->image = $image_full_name;
        }
        $collection->status = 1;
        
         // return response()->json($collection);
        $collection->save();
        return response()->json(['success' => __('success')]);
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collection = Collection::where('id',$id)->first();
        return Response()->json($collection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if (request()->ajax())
        {
            $data = Collection::findOrFail($id);

            return response()->json(['data' => $data]);
        }
         // $collection = Collection::where('id',$id)->first();
         // return view('admin.editBrand',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->hidden_id;
        $data = [];
        $data['name'] = htmlspecialchars($request->name);
        $image = $request->file('image');
        if ($image) {
            $image_name = Str::random(8);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/images/collections/';
            //$image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['image'] = $image_full_name;
        }
        $data['status'] = 1;
        Collection::whereId($id)->update($data);
        return response()->json(['success'=>'updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       Collection::whereId($id)->delete();

       return response()->json(['success' => __('Data is successfully deleted')]);

    }
    public function status($id,$status)
    {
        Collection::where('id',$id)->update(['status'=>$status]);
        return response()->json(['success' => _('updates')]);
    }
}
