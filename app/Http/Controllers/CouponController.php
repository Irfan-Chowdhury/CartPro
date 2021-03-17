<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Str;
class CouponController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        if (request()->ajax())
            {
                // $category = Category::with('parentCategory')->get();
                // return $category;
                return datatables()->of(Coupon::oldest()->get())
                    ->setRowId(function ($coupon)
                    {
                        return $coupon->id;
                    })
            
                    ->addColumn('action', function ($data)
                    {
                        $button = '';
                       
                        $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm parent_load"><i class="dripicons-pencil"></i></button>';
                        $button .= '&nbsp;&nbsp;';
                        
                         $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';

                         $button .= '&nbsp;&nbsp;';
                         if ($data->status == 0) {
                                $button .= '<button type="button"  name="active" id="' . $data->id . '" status="1" class="btn btn-success btn-sm status"><i class="dripicons-thumbs-up"></i></button>';
                            }else{
                                $button .= '<button type="button"  name="inactive" id="' . $data->id . '" status="0" class=" btn btn-danger btn-sm status"><i class="dripicons-thumbs-down"></i></button>';
                            }   
                         
                        

                        return $button;
                    })
                    ->
                    rawColumns(['action', 'coupon_name'])
                    ->make(true);
            }
            return view('admin.pages.allCoupon');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.createCoupon');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Coupon = new Coupon;
        $Coupon->coupon_name = htmlspecialchars($request->coupon_name);
        $Coupon->coupon_code = Str::random(8);
        $Coupon->discount_type =$request->discount_type;
        $Coupon->discount_amount = htmlspecialchars($request->discount_amount);
        $Coupon->start_date = $request->start_date;
        $Coupon->end_date = $request->end_date;
        $Coupon->min_limit = htmlspecialchars($request->min_limit);
        $Coupon->usage_limit = htmlspecialchars($request->usage_limit);
        $Coupon->status = 1;
        $Coupon->save();
        return response()->json(['success'=> __('inserted')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Coupon = Coupon::where('id',$id)->first();
        return Response()->json($Coupon);
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
            $data = Coupon::findOrFail($id);

            return response()->json(['data' => $data]);
        }
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
        // return $id;
        $data = [];
        $data['coupon_name'] = htmlspecialchars($request->coupon_name);
        $data['discount_type'] = $request->discount_type;
        $data['discount_amount'] = htmlspecialchars($request->discount_amount);
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['min_limit'] = htmlspecialchars($request->min_limit);
        $data['usage_limit'] = htmlspecialchars($request->usage_limit);
        $data['status'] = 1;
        //return response()->json($data);
        Coupon::whereId($id)->update($data);

        return response()->json(['success' => __('updated')]);
    }

    public function destroy($id)
    {

        Coupon::whereId($id)->delete();

        return response()->json(['success' => __('Data is successfully deleted')]);

    }
    function delete_by_selection(Request $request)
    {

            $coupon_id = $request['CouponListIdArray'];
            $coupons = Coupon::whereIn('id', $coupon_id);
            if ($coupons->delete())
            {
                return response()->json(['success' => __('Multi Delete', ['key' => trans('file.Account')])]);
            } else
            {
                return response()->json(['error' => 'Error,selected Accounts can not be deleted']);
            }
        

       
    }

    public function status($id,$status)
    {
        // return $id;
        // return $status;
        Coupon::where('id',$id)->update(['status'=>$status]);
        return response()->json(['success' => _('updates')]);
    }
     public function parentLoad()
    {
        $Coupon = Coupon::all();

        return response()->json(['success' => _('updates'),'data'=>$Category]);
    }
   
}
