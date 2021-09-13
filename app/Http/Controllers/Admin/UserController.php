<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use App\Traits\imageHandleTrait;
use App\Traits\ActiveInactiveTrait;

class UserController extends Controller
{
    use imageHandleTrait, ActiveInactiveTrait;

    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    public function index()
    {
        if (auth()->user()->can('user-view'))
        {
            $roles =  Role::where('is_active','=',1)->select('id','name')->get();
            $users = User::with('roleName')
                    ->orderBy('is_active','DESC')
                    ->orderBy('id','DESC')
                    ->get();


            if (request()->ajax())
            {
                return datatables()->of($users)
                    ->setRowId(function ($user)
                    {
                        return $user->id;
                    })
                    ->addColumn('image', function ($row)
                    {
                        // return $row->roleName->name;

                        if ($row->image==NULL) {
                            return '<img src="'.url("public/images/empty.jpg").'" alt="" height="50px" width="50px">';
                        }else {
                            $url = url("public/".$row->image);
                            return  '<img src="'. $url .'" height="50px" width="50px"/>';
                        }
                    })
                    ->addColumn('full_name',function($data)
                    {
                        return $data->first_name.' '.$data->last_name;
                    })
                    // ->addColumn('last_login_at',function($data)
                    // {
                    //     if ($data->last_login_at)
                    //     {
                    //         $new_date =  Carbon::parse($data->last_login_at);
                    //         return $new_date->diffForHumans();
                    //     }else{
                    //         return '';
                    //     }

                    // })
                    ->addColumn('roleName', function($data){
                        return $data->roleName->name;
                    })
                    // ->addColumn('created_at',function($data)
                    // {
                    //     if ($data->created_at) {
                    //         $new_date = Carbon::parse($data->created_at);
                    //         return $new_date->diffForHumans();
                    //     }
                    // })
                    ->addColumn('action', function ($row)
                    {
                        $button = '';
                        if (auth()->user()->can('user-edit'))
                        {
                            $button = '<button type="button" name="edit" id="' . $row->id . '" class="edit btn btn-primary btn-sm parent_load"><i class="dripicons-pencil"></i></button>';
                        }

                        if (auth()->user()->can('user-action'))
                        {
                            $button .= '&nbsp;&nbsp;';
                            if ($row->is_active==1) {
                                $button .= '<button type="button" title="Inactive" class="inactive btn btn-danger btn-sm" data-id="'.$row->id.'"><i class="dripicons-thumbs-down"></i></button>';
                            }else {
                                $button .= '<button type="button" title="Active" class="active btn btn-success btn-sm" data-id="'.$row->id.'"><i class="dripicons-thumbs-up"></i></button>';
                            }
                        }
                        return $button;
                    })
                    ->rawColumns(['image','action'])
                    ->make(true);
            }

            return view('admin.pages.user.index',compact('roles'));
        }
        return abort('403', __('You are not authorized'));
    }


    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(),[
                'password'         => 'min:6',
                'confirm_password' => 'required_with:password|same:password|min:6',
                'email'            =>'required|email|unique:users',
                'username'         =>'required|string|unique:users',
                'role'             =>'required',
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        if (auth()->user()->can('user-action'))
        {
            if ($request->ajax()) {
                $user = new User();
                $user->username   = htmlspecialchars($request->username);
                $user->first_name = htmlspecialchars($request->first_name);
                $user->last_name  = htmlspecialchars($request->last_name);
                $user->phone      = htmlspecialchars($request->phone);
                $user->email      = htmlspecialchars($request->email);
                $user->password   = Hash::make($request->password);
                $user->user_type  = 1;
                $user->role    = $request->role;
                $user->is_active = $request->is_active;
                if($request->image) {
                    $user->image = $this->imageSliderStore($request->image, $directory='images/users/');
                }
                $user->save();

                $user->syncRoles($request->role);

                return response()->json(['success' => __('Data Saved Successfully.')]);
            }
        }
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
        if (auth()->user()->can('user-edit'))
        {
            $id = $request->hidden_id;
            $validator =  Validator::make($request->all(),
            [
                'password' => 'nullable|min:6',
                'confirm_password' => 'nullable|min:6',
                'email'=>'required|email|unique:users,email,'.$id,
                'username'=>'nullable|string|unique:users,username,'.$id,
            ]);

            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }

            if ($request->ajax()) {
                $data = [];
                $data['username'] = htmlspecialchars($request->username);
                $data['first_name'] = htmlspecialchars($request->first_name);
                $data['last_name'] = htmlspecialchars($request->last_name);
                $data['phone'] = htmlspecialchars($request->phone);
                $data['email'] = htmlspecialchars($request->email);
                //if ($request->password) {
                    $data['password'] = Hash::make($request->password);
                //}
                $data['user_type']= 1;
                $data['role']     = $request->role;
                $data['is_active']= $request->is_active;

                if($request->image) {
                    $data['image'] = $this->imageSliderStore($request->image, $directory='images/users/');
                }
                User::whereId($id)->update($data);

                $user = User::find($id);
                // return response()->json($user);
                $user->syncRoles($request->role);

                return response()->json(['success' => __('Data Updated Successfully.')]);
            }
        }
    }

    public function active(Request $request){
        if ($request->ajax()){
            return $this->activeData(User::find($request->id));
        }
    }

    public function inactive(Request $request){
        if ($request->ajax()){
            return $this->inactiveData(User::find($request->id));
        }
    }

    public function bulkAction(Request $request)
    {
        if ($request->ajax()) {
            return $this->bulkActionData($request->action_type, User::whereIn('id',$request->idsArray));
        }
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
