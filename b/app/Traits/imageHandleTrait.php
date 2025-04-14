<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Facades\Session;
use Image;
use Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait imageHandleTrait {

    public function imageStore(string|object $imageFile, string $directory, int $width, int $height)
    {

        // $directory = 'uploads/images/categories/';

        $fileName  = Str::random(10). '.' .$imageFile->getClientOriginalExtension();

        $image = Image::make($imageFile)->resize($width, $height)->encode('jpg');

        $filePath = $directory."{$fileName}";

        Storage::disk('public')->put($filePath, $image);

        // $imageUrl = Storage::url($filePath);

        return $filePath;




        // $imageName        = Str::random(10). '.' .$image->getClientOriginalExtension();

        // $location = public_path($directory.$imageName);

        // if ($type=='category') {
        //     // Image::make($image)->encode('jpg', 60)->fit(500,150)->save($location);
        //     $imageConvertFile = Image::make($image)->encode('jpg', 60)->fit(500,150);
        //     Storage::disk('public')->put($filePath, $imageName);
        //     $fileUrl = Storage::url($filePath);
        // }
        // else if ($type=='brand') {
        //     Image::make($image)->encode('jpg', 60)->fit(500,150)->save($location);
        // }
        // elseif ($type=='header_logo' || $type=='mail_logo') {
        //     Image::make($image)->encode('jpg', 60)->fit(280,62)->save($location);
        // }
        // elseif($type=='store_front_footer')
        // {
        //     Image::make($image)->encode('jpg', 60)->fit(342,30)->save($location);
        // }
        // elseif($type=='general')
        // {
        //     Image::make($image)->encode('jpg', 60)->save($location);
        // }
        // elseif($type=='topbar_logo')
        // {
        //     $filename = Str::random(10).'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path($directory), $filename);
        //     return $directory.$filename;
        // }
        // elseif($type=='slider_banner')
        // {
        //     Image::make($image)->encode('jpg', 60)->fit(500,230)->save($location);
        // }
        // elseif($type=='one_column_banner')
        // {
        //     Image::make($image)->encode('jpg', 60)->fit(1200,270)->save($location);
        // }
        // elseif($type=='two_column_banners')
        // {
        //     Image::make($image)->encode('jpg', 60)->fit(870,270)->save($location);
        // }
        // elseif($type=='three_column_banners' || $type=='three_column_full_width_banners')
        // {
        //     Image::make($image)->encode('jpg', 60)->fit(570,230)->save($location);
        // }
        // elseif($type=='newslatter')
        // {
        //     $imageName      = 'newslatter'. '.' .'jpg';
        //     $location = public_path($directory.$imageName);
        //     Image::make($image)->encode('jpg', 60)->fit(850,450)->save($location);
        // }
        // elseif($type=='about_us')
        // {
        //     Image::make($image)->encode('webp', 60)->fit(1920,1240)->save($location);
        // }
        // else {
        //     Image::make($image)->encode('jpg', 60)->fit(300,300)->save($location);
        // }

        // $imageUrl = $directory.$imageName;
        // return $imageUrl;
    }


    public function imageSliderStore($image, $directory,$width, $height)
    {
        $imageName       = Str::random(10). '.' .$image->getClientOriginalExtension();
        $location  = public_path($directory.$imageName);
        Image::make($image)->resize($width,$height)->save($location);
        $imageUrl = $directory.$imageName;

        return $imageUrl;
    }


    //General
    public function previousImageDelete(string|null $filePath): void
    {
        // if (File::exists(public_path($filePath))) {
        //     File::delete(public_path($filePath));
        // }

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
    }
}
