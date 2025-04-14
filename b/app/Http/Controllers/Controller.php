<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setSuccessMessage($message): void
	{
        session()->flash('message',$message);
        session()->flash('type','success');
	}

	public function setErrorMessage($message): void
	{
        session()->flash('message',$message);
		session()->flash('type','danger');
	}


    public function sendResponse($message = null, $result = null)
    {
    	$response = [
            'success' => true,
            'result'  => $result,
        ];

        if($message){
            $response['message'] = $message;
        }

        return response()->json($response, 200);
    }

    public function sendError($errorMessage, $code = 500)
    {
    	$response = [
            'success' => false,
            'errorMessage' => $errorMessage,
        ];

        // if(!empty($errorMessages)){
        //     $response['errors'] = $errorMessages;
        // }

        return response()->json($response, $code);
    }
}
