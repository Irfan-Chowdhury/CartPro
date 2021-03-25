<?php
namespace App\Traits;

use App\Models\Attribute;

/**
 * 
 */
trait ActiveInactiveTrait{

    public function activeData($Model){

        $data = $Model;
        $data->is_active = 1;
        $data->save();
        
        return response()->json(['success' => 'Data Active Successfully']);
    }

    public function inactiveData($Model){

        $data = $Model;
        $data->is_active = 0;
        $data->save();

        return response()->json(['success' => 'Data Inactive Successfully']);
    }
}



?>