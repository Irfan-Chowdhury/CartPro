<?php
namespace App\Traits;

trait ArrayToObjectConvertionTrait
{
    private function arrayToObject($array)
    {
        return json_decode(json_encode($array), false);
    }
}
