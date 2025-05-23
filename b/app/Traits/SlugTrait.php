<?php
namespace App\Traits;

use Illuminate\Support\Facades\Session;

trait SlugTrait{

    public function slug($string) {
        if (Session::get('currentLocale')=='en') {
            $string = strtolower($string);
        }
        return preg_replace('/\s+/u', '-', trim($string));
    }
}

?>
