<?php

namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait UploadFileTrait
{
    public function upload($image, $request, $path)
    {
        if ($request->hasFile("images")) {
            $destinationPath = $image->image;
            if (file_exists($destinationPath)) {
                unlink($destinationPath);
            }
            $file = $request->file("images");
            $name = $file->getClientOriginalName();
            $name_image = Str::random(5) . "_" . Str::random(5) . "_" . $name;
            while (file_exists($path . $name_image)) {
                $name_image = Str::random(5) . "_" . Str::random(5) . "_" . $name;
            }
            $file->move($path, $name_image);
            $image->image = $path . $name_image;
        }
        return $image;
    }
}
