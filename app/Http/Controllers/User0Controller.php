<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        if (request()->ajax())
            {

                return datatables()->of(User::oldest()->get())
                    ->setRowId(function ($user)
                    {
                        return $user->id;
                    })
                    ->addColumn('last_login_at',function($data)
                    {
                        if ($data->last_login_at)
                        {
                            $new_date =  Carbon::parse($data->last_login_at);
                           return $new_date->diffForHumans();
                    }else{
                         return '';
                    }

                    })
                    ->addColumn('created_at',function($data)
                    {
                        if ($data->created_at) {
                            $new_date = Carbon::parse($data->created_at);
                            return $new_date->diffForHumans();
                        }
                    })
                    ->addColumn('action', function ($data)
                    {
                        $button = '';

                        $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm parent_load"><i class="dripicons-pencil"></i></button>';
                        $button .= '&nbsp;&nbsp;';

                         $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';

                         // $button .= '&nbsp;&nbsp;';
                         // if ($data->status == 0) {
                         //        $button .= '<button type="button"  name="active" data-id="' . $data->id . '" data-status="1" class="btn btn-success btn-sm status"><i class="dripicons-thumbs-up"></i></button>';
                         //    }else{
                         //        $button .= '<button type="button"  name="delete" data-id="' . $data->id . '" data-status="0" class=" btn btn-danger btn-sm status"><i class="dripicons-thumbs-down"></i></button>';
                         //    }



                        return $button;
                    })
                    ->
                    rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.pages.allUser');
    }


    public function store(Request $request)
    {
      $validator =  Validator::make($request->all(),
      [
        'password' => 'min:6',
        'confirm_password' => 'required_with:password|same:password|min:6',
        'email'=>'required|email|unique:users',
        'username'=>'required|string|unique:users',
            ]
        );

      if ($validator->fails())
      {
        return response()->json(['errors'=>$validator->errors()->all()]);
      }
        $User = new User;
        $User->username = htmlspecialchars($request->username);
        $User->first_name = htmlspecialchars($request->first_name);
        $User->last_name = htmlspecialchars($request->last_name);
        $User->phone = htmlspecialchars($request->phone);
        $User->email = htmlspecialchars($request->email);
        $User->password = Hash::make($request->password);
        $User->role = $request->role;
        $image = $request->file('image');
        if ($image) {
            $image_name = Str::random(8);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/images/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $User->image= $image_url;
        }
          //return response()->json($User);
        $User->save();
        return response()->json(['success' => __('success')]);


    }

    public function edit($id)
    {
        if (request()->ajax())
        {
            $data = User::findOrFail($id);

            return response()->json(['data' => $data]);
        }

    }


    public function update(Request $request)
    {
        $id = $request->hidden_id;
        $validator =  Validator::make($request->all(),
      [
        'password' => 'min:6',
        'confirm_password' => 'required_with:password|same:password|min:6',
        'email'=>'required|email|unique:users,email,'.$id,
        'username'=>'required|string|unique:users,username,'.$id,
            ]
        );

      if ($validator->fails())
      {
        return response()->json(['errors'=>$validator->errors()->all()]);
      }

        $data = [];
        $data['username'] = htmlspecialchars($request->username);
        $data['first_name'] = htmlspecialchars($request->first_name);
        $data['last_name'] = htmlspecialchars($request->last_name);
        $data['phone'] = htmlspecialchars($request->phone);
        $data['email'] = htmlspecialchars($request->email);
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;
        $image = $request->file('image');
        if ($image) {
            $image_name = Str::random(8);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/images/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['image'] = $image_url;
        }
        //return response()->json($data);
        User::whereId($id)->update($data);

        return response()->json(['success' => __('updated')]);

    }

    public function destroy($id)
    {
        User::whereId($id)->delete();

        return response()->json(['success' => __('Data is successfully deleted')]);

    }
    function delete_by_selection(Request $request)
    {

        $user_id = $request['UserListIdArray'];
        $users = User::whereIn('id', $user_id);
        if ($users->delete())
        {
            return response()->json(['success' => __('Multi Delete', ['key' => trans('file.Account')])]);
        } else
        {
            return response()->json(['error' => 'Error,selected Accounts can not be deleted']);
        }

    }

    // public function status($id,$status)
    // {
    //     //echo "string";
    //     //return $status;
    //     User::where('id',$id)->update(['status'=>$status]);
    //     return response()->json(['success' => _('updates')]);
    // }



}
