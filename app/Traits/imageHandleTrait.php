<?php

namespace App\Traits;
use Illuminate\Support\Facades\Session;
use Image;
use Str;
use Illuminate\Support\Facades\File;

trait imageHandleTrait{

    public function imageStore($image, $directory, $type)
    {
        // $img        = Str::random(10). '.' .$image->getClientOriginalExtension();
        $img        = Str::random(10). '.' .'webp';
        $location = public_path($directory.$img);
        if ($type=='brand') {
            Image::make($image)->encode('webp', 60)->resize(500,150)->save($location);
        }
        elseif ($type=='header_logo') {
            Image::make($image)->encode('webp', 60)->fit(280,62)->save($location);
        }
        else {
            Image::make($image)->encode('webp', 60)->resize(300,300)->save($location);
        }
        $imageUrl = $directory.$img;

        return $imageUrl;
    }

    public function imageSliderStore($image, $directory)
    {
        $img        = Str::random(10). '.' .$image->getClientOriginalExtension();
        $location = public_path($directory.$img);
        Image::make($image)->resize(775,445)->save($location);
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
