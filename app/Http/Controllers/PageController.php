<?php

namespace App\Http\Controllers;
use App\Page;
use Illuminate\Http\Request;
use Str;
class PageController extends Controller
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

        //$Category = Category::all();

        if (request()->ajax())
            {
                // $category = Category::with('parentCategory')->get();
                // return $category;
                return datatables()->of(Page::oldest()->get())
                    ->setRowId(function ($page)
                    {
                        return $page->id;
                    })
                    // ->addColumn('parent', function ($row)
                    // {
                    //     return $row->parentCategory->category_name ?? '';
                    // })
                    ->addColumn('action', function ($data)
                    {
                        $button = '';

                        $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm parent_load"><i class="dripicons-pencil"></i></button>';
                        $button .= '&nbsp;&nbsp;';

                         $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';

                         $button .= '&nbsp;&nbsp;';
                         if ($data->status == 0) {
                                $button .= '<button type="button"  name="active" data-id="' . $data->id . '" data-status="1" class="btn btn-success btn-sm status"><i class="dripicons-thumbs-up"></i></button>';
                            }else{
                                $button .= '<button type="button"  name="delete" data-id="' . $data->id . '" data-status="0" class=" btn btn-danger btn-sm status"><i class="dripicons-thumbs-down"></i></button>';
                            }


                        return $button;
                    })
                    ->
                    rawColumns(['action', 'page_name'])
                    ->make(true);
            }
            return view('admin.pages.allPage');
    }


    public function store(Request $request)
    {

        $Page = new Page;
        $Page->page_name = htmlspecialchars($request->page_name);
        $Page->description = htmlspecialchars($request->description);
        $Page->URL = htmlspecialchars($request->url);
        $Page->meta_title = htmlspecialchars($request->meta_title);
        $Page->meta_description = htmlspecialchars($request->meta_description);
        $Page->og_title = htmlspecialchars($request->og_title);
        $image = $request->file('image');
        if ($image) {
            $image_name = Str::random(8);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/images/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $Page->og_image = $image_url;
        }
        $Page->og_description = htmlspecialchars($request->og_description);
        $Page->status = 1;

        // return response()->json($Category);
        $Page->save();
        return response()->json(['success' => __('success')]);


    }

    public function edit($id)
    {
        if (request()->ajax())
        {
            $data = Page::findOrFail($id);

            return response()->json(['data' => $data]);
        }

    }


    public function update(Request $request)
    {
        $id = $request->hidden_id;
        $data = [];
        $data['page_name'] = htmlspecialchars($request->page_name);
        $data['description'] = htmlspecialchars($request->description);
        $data['URL'] = htmlspecialchars($request->url);
        $data['meta_title'] = htmlspecialchars($request->meta_title);
        $data['meta_description'] = htmlspecialchars($request->meta_description);
        $data['og_title'] = htmlspecialchars($request->og_title);
        $image = $request->file('image');
        if ($image) {
            $image_name = Str::random(8);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/images/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['og_image'] = $image_url;
        }
        $data['og_description'] = htmlspecialchars($request->og_description);
        //$data['featured'] = htmlspecialchars($request->featured);
        $data['status'] = 1;
        //return response()->json($data);
        Page::whereId($id)->update($data);

        return response()->json(['success' => __('updated')]);

    }

    public function destroy($id)
    {
        Page::whereId($id)->delete();

        return response()->json(['success' => __('Data is successfully deleted')]);

    }
    function delete_by_selection(Request $request)
    {

        $page_id = $request['PageListIdArray'];
        $pages = Page::whereIn('id', $page_id);
        if ($pages->delete())
        {
            return response()->json(['success' => __('Multi Delete', ['key' => trans('file.Account')])]);
        } else
        {
            return response()->json(['error' => 'Error,selected Accounts can not be deleted']);
        }

    }

    public function status($id,$status)
    {
        //echo "string";
        //return $status;
        Page::where('id',$id)->update(['status'=>$status]);
        return response()->json(['success' => _('updates')]);
    }


     public function parentLoad()
    {
        $Page = Page::all();

        return response()->json(['success' => _('updates'),'data'=>$Page]);
    }

}
