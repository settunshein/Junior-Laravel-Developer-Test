<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait DeleteFile
{
    public function deleteFile($file_name, $folder)
    {
        foreach (['thumbnail', 'medium'] as $size) {
            Storage::disk('public')->delete("$folder/$size/$file_name");
        }
    }
}
