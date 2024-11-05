<?php

namespace App\Traits;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

trait UploadFile
{
    public function uploadFile($file, $folder)
    {
        $manager   = new ImageManager(new Driver());
        $file_name = uniqid(time()) . '_' . $file->getClientOriginalName();
        $image = $manager->read($file);

        $sizes = [
            'thumbnail' => [100, 100],
            'medium'    => [600, 600],
        ];

        foreach ($sizes as $key => $size) {
            $resized_image = $image->resize($size[0], $size[1]);
            $save_path     = "$folder/$key/";
            $encode        = $resized_image->toJpeg(80);
            Storage::disk('public')->put($save_path . $file_name, $encode);
        }

        return $file_name;
    }
}
