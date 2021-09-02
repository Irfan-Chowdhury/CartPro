<?php

namespace App\Traits;
use Illuminate\Support\Facades\Session;
use Image;
use Str;
use Illuminate\Support\Facades\File;

trait imageHandleTrait{

    public function imageStore($image, $directory)
    {
        $img        = Str::random(10). '.' .$image->getClientOriginalExtension();
        $location = public_path($directory.$img);
        Image::make($image)->resize(300,300)->save($location);
        $imageUrl = $directory.$img;

        return $imageUrl;
    }
    public function imageSliderStore($image, $directory)
    {
        $img        = Str::random(10). '.' .$image->getClientOriginalExtension();
        $location = public_path($directory.$img);
        Image::make($image)->resize(1900,633)->save($location);
        $imageUrl = $directory.$img;

        return $imageUrl;
    }


    public function previousImageDelete($image_path)
    {
        if (File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }
        return;
    }
}

?>
