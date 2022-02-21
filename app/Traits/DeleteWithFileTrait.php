<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;


trait DeleteWithFileTrait{

    public function deleteWithImage($model, $image_path)
    {
        if (File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }
        $model->delete();
        return;
    }

    public function deleteWithMultipleImages($model)
    {
        foreach ($model->get() as $item) {
            if (File::exists(public_path($item->image))) {
                File::delete(public_path($item->image));
            }
        }
        $model->delete();
        return;
    }
}
?>
