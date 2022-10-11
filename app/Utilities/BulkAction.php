<?php
namespace App\Utilities;

class BulkAction
{
    public static function setBulkAction($action_type, $Model)
    {
        $data = $Model;
        if ($action_type=='active'){
            $data->update(['is_active'=>1]);
            return response()->json(['success' => 'Data Active Successfully']);
        }else if ($action_type=='inactive'){
            $data->update(['is_active'=>0]);
            return response()->json(['success' => 'Data Inactive Successfully']);
        }else if ($action_type=='delete'){
            $data->delete();
            return response()->json(['success' => 'Data Deleted Successfully']);
        }
    }
}
